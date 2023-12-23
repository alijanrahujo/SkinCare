@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>My Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <section class="container my-4">
                        @foreach ($orders as $order)
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Order #{{ $order->id }}</span>
                                    <span class="badge bg-warning">{{ $order->status }}</span>
                                </div>
                                <div class="card-body">
                                    @foreach ($order->orderDetails as $product)
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <img src="{{ asset('storage/uploads/products/' . $product->product->thumbnail) }}"
                                                    alt="Product 1" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <h3>{{ $product->title }}</h3>
                                                <p>Quantity: {{ $product->qty }}</p>
                                                <p>Price: RS {{ $product->price }} each | Total: RS
                                                    {{ $product->price * $product->qty }}</p>
                                                <p>Delivey address: {{ $order->address }}, {{ $order->city }},
                                                    {{ $order->phone }}</p>
                                                <p>Order date: RS {{ $order->created_at }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')

@endsection
