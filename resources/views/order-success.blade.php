@extends('layouts.main')

@section('title')
    <title>Order Success</title>
@endsection

@section('css')
    @include('layouts.partials.css')
@endsection

@section('js')
    @include('layouts.partials.js')
@endsection

@section('content')
    <div class="page-content-wrapper sp-y">
        <div class="container text-center">
            <h2 class="text-success">🎉 Thank you for your order!</h2>
            <p>Your payment was successful and we’ve received your order.</p>
            <p>You’ll get a confirmation email shortly.</p>


            <div class="mt-4">
                <a href="{{ route('shop') }}" class="btn btn-brand">Continue Shopping</a>
                <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-secondary">
                    Download Invoice
                </a>
            </div>
        </div>
    </div>
@endsection
