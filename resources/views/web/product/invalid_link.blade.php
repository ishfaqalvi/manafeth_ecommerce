@extends('web.layout.app')

@section('title')
    Invalid Link
@endsection

@section('content')
    <div class="container-fluid p-3">
        <div class="container text-center my-md-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4 text-danger"><i class="fas fa-exclamation-triangle"></i> Invalid Link</h1>
                    <p class="lead mt-4">The link you tried to access is not valid. It might have been mistyped or the link
                        may have expired.</p>
                    <div class="mt-5">
                        <a href="{{ route('home') }}" class="btn btn-primary">Return to Homepage</a>
                        <a href="{{ route('web.products.rent') }}" class="btn btn-secondary">Browse Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
