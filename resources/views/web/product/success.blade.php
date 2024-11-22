@extends('web.layout.app')

@section('title')
    Order Placed
@endsection

@section('content')
    <div class="container-fluid p-3">
        <div class="container text-center my-md-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4 text-success"><i class="fas fa-check-circle"></i> Thank You!</h1>
                    <p class="lead mt-4">Your order has been placed successfully.</p>
                    <div class="mt-5">
                        <a href="{{ route('web.products.rent') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
                        @if($link)
                            <a href="{{ $link->payment_link }}" target="_blank" class="btn btn-secondary btn-lg">Pay Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
