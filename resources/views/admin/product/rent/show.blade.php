@extends('admin.layout.app')

@section('title')
    {{ $product->name ?? "{{ __('Show') Product" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Product Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('products.rent.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-arrow-circle-left"></i>
                </span>
                Back
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Show') }} Product</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Brand:</strong>
                {{ $product->brand->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Category:</strong>
                {{ $product->category->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Sub Category:</strong>
                {{ $product->subCategory->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>
            <div class="form-group mb-3">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
            <div class="form-group mb-3">
                <strong>Status:</strong>
                {{ $product->status }}
            </div>
            <div class="form-group mb-3">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
            <div class="form-group mb-3">
                <strong>Detail:</strong>
                {{ $product->detail }}
            </div>
            <div class="form-group mb-3">
                <strong>Thumbnail:</strong>
                <img src="{{ $product->thumbnail }}">
            </div>
        </div>
    </div>
</div>
@endsection