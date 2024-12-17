@extends('frontend.layout.ecom-layout')

@section('pageTitle')
    Product Checkout |
@endsection

@section('mainContent')
    <section class="checkout pt-4">
        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </header>

        <div class="container">
            <h2 class="mb-4">Checkout</h2>
            <div class="row">
                <!-- Billing Details -->
                <div class="col-md-6">
                    <form action="{{ route('frontend.cart.checkout.order.store') }}" method="POST" id="orderConfirmation">
                        @csrf
                        @if (!session()->has('affiliate_id') || session('affiliate_id') == 'No affiliate_id is found')
                        <div class="mb-3">
                            <label for="affiliate_id" class="form-label">Select an organization to donate to</label>
                            <select name="affiliate_id" id="affiliate_id" class="form-control">
                                <option value="" disabled selected>Select an organization</option>
                                @foreach ($globalOrganizations as $organization)
                                    <option value="{{$organization->unique_ref}}">{{$organization->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif                     
                        <h4>Billing Details</h4>
                        <div class="mb-3">
                            <label for="buyer_name" class="form-label">Your Name</label>
                            <input type="text" name="buyer_name" id="buyer_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="buyer_email" class="form-label">Email</label>
                            <input type="email" name="buyer_email" id="buyer_email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_phone" class="form-label">Phone</label>
                            <input type="text" name="buyer_phone" id="buyer_phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="buyer_address" class="form-label">Shipping Address</label>
                            <textarea name="buyer_address" id="buyer_address" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="buyer_city" class="form-label">City</label>
                            <input type="text" name="buyer_city" id="buyer_city" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_state" class="form-label">State</label>
                            <input type="text" name="buyer_state" id="buyer_state" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_zipcode" class="form-label">Zip Code</label>
                            <input type="text" name="buyer_zipcode" id="buyer_zipcode" class="form-control">
                        </div>
                    {{-- </form> --}}
                </div>

                <!-- Order Summary -->
                <div class="col-md-6">
                    <h4>Order Summary</h4>
                    <div class="card">
                        <div class="card-body">
                            @php
                                $subTotal = 0;
                                $totalTax = 0;
                            @endphp
                            @foreach ($cartItems as $item)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <img src="{{ asset($item->product->thumb_small) }}" alt="{{ $item->product->title }}"
                                        class="img-thumbnail" style="width: 60px; height: 60px;">
                                    <div>
                                        <p class="mb-0"><strong>{{ $item->product->title }}</strong></p>
                                        <small>${{ number_format($item->price, 2) }} x {{ $item->qty }}</small>
                                    </div>
                                    <p class="mb-0"><strong>${{ number_format($item->price * $item->qty, 2) }}</strong>
                                    </p>
                                </div>
                                @php
                                    $subTotal += $item->price * $item->qty;
                                    $totalTax += $item->product->vat_amount ?? 0;
                                @endphp
                            @endforeach
                            <hr>
                            <p><strong>Subtotal:</strong> ${{ $subTotal }}</p>
                            <input type="hidden" name="sub_total" value="{{ $subTotal }}">
                            {{-- <p><strong>Shipping:</strong> 222</p> --}}
                            <p><strong>Tax:</strong>
                                @if ($cartItems->sum('qty') > 0)
                                    {{ round($totalTax / $cartItems->sum('qty')) }}%
                                    <input type="hidden" name="total_vat" value="{{ round($totalTax / $cartItems->sum('qty')) }}">
                                @else
                                    0% {{-- Or display some appropriate message --}}
                                    <input type="hidden" name="total_vat" value="0">
                                @endif
                            </p>
                            @php
                                $totalQty = $cartItems->sum('qty');
                                $taxRate = $totalQty > 0 ? round($totalTax / $totalQty) : 0; // Safely calculate tax rate
                            @endphp

                            <p>
                                <strong>Grand Total:</strong> 
                                ${{ round($subTotal + ($taxRate / 100) * $subTotal) }}
                                <input type="hidden" name="grand_total" value="{{ round($subTotal + ($taxRate / 100) * $subTotal) }}">
                            </p>
                        </div>
                    </div>

                    <h4 class="mt-4">Payment Method</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="cod"
                            value="cod" checked>
                        <label class="form-check-label" for="cod">
                            Cash on Delivery (COD)
                        </label>
                    </div>
                </form>
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                        <label class="form-check-label" for="credit_card">
                            Credit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                    </div> --}}
                    <button type="submit" onclick="submitOrder()" class="btn btn-primary mt-3">Place Order</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Function to submit the order form
        function submitOrder() {
            // Get the form element by its ID
            var form = document.getElementById('orderConfirmation');

            // Ensure the form exists
            if (form) {
                // Submit the form
                form.submit();
            } else {
                console.error('Form with ID "orderConfirmation" not found!');
            }
        }
    </script>
@endpush
