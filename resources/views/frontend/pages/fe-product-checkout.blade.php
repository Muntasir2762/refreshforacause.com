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
                    <h4>Billing Details</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" id="state" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" name="zip" id="zip" class="form-control" required>
                        </div>
                    </form>
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
                                    <img src="{{ asset($item->product->thumb_small) }}" alt="{{ $item->product->title }}" class="img-thumbnail" style="width: 60px; height: 60px;">
                                    <div>
                                        <p class="mb-0"><strong>{{ $item->product->title }}</strong></p>
                                        <small>${{ number_format($item->price, 2) }} x {{ $item->qty }}</small>
                                    </div>
                                    <p class="mb-0"><strong>${{ number_format($item->price * $item->qty, 2) }}</strong></p>
                                </div>
                                @php
                                    $subTotal += $item->price * $item->qty;
                                    $totalTax += $item->product->vat_amount ?? 0;
                                @endphp
                            @endforeach
                            <hr>
                            <p><strong>Subtotal:</strong> ${{$subTotal}}</p>
                            {{-- <p><strong>Shipping:</strong> 222</p> --}}
                            <p><strong>Tax:</strong> {{ round($totalTax / $cartItems->sum('qty')) }}%</p>
                            <p><strong>Grand Total:</strong> ${{ round($subTotal + ((round($totalTax / $cartItems->sum('qty'))/100)*$subTotal)) }}</p>
                        </div>
                    </div>

                    <h4 class="mt-4">Payment Method</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                        <label class="form-check-label" for="credit_card">
                            Cash on Delivery (COD)
                        </label>
                    </div>
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
                    <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                </div>
            </div>
        </div>
    </section>
@endsection
