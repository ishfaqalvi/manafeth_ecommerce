@extends('admin.layout.app')

@section('title')
    {{ $promoCode->name ?? "Show Promo Code" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Promo Code Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('promo-codes.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Promo Code</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Title:</strong>
                            {{ $promoCode->title }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Code:</strong>
                            {{ $promoCode->code }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Discount Type:</strong>
                            {{ $promoCode->discount_type }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Discount Value:</strong>
                            {{ $promoCode->discount_value }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Valid From:</strong>
                            {{ $promoCode->valid_from }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Valid Until:</strong>
                            {{ $promoCode->valid_until }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Usage Limit:</strong>
                            {{ $promoCode->usage_limit }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Status:</strong>
                            {{ $promoCode->status }}
                        </div>

        </div>
    </div>
</div>
@endsection