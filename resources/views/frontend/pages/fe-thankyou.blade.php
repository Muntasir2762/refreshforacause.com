@extends('frontend.layout.ecom-layout')

@section('pageTitle')
    Thank You |
@endsection

@section('mainContent')
    <section class="thank-you pt-5 pb-5">
        <div class="container text-center">
            <div class="card shadow-lg p-4">
                <div class="card-body">
                    <h1 class="display-4 text-success">Thank You!</h1>
                    <p class="lead">Your order has been successfully placed.</p>
                    <hr class="my-4">
                    <h3>Order Summary</h3>
                    <div class="mt-3 mb-3">
                        <p><strong>Order ID:</strong> REFC0001</p>
                        {{-- <p><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>
                        <p><strong>Total Amount:</strong> ${{ number_format($order->total, 2) }}</p> --}}
                    </div>
                    {{-- <h4 class="mt-4">Products in Your Order:</h4>
                    <ul class="list-group mb-4">
                        @foreach ($order->orderDetails as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->name }}</strong> <br>
                                    <small>Quantity: {{ $item->quantity }}</small>
                                </div>
                                <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul> --}}
                    <p class="text-muted">A confirmation email has been sent to your email address.</p>
                    <a href="/" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
@endsection
