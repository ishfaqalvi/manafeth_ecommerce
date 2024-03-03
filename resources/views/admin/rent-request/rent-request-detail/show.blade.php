@extends('admin.layout.app')

@section('title')
    {{ $rentRequestDetail->name ?? "{{ __('Show') Rent Request Detail" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Request Detail Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('rent-request-details.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Rent Request Detail</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Request Id:</strong>
                            {{ $rentRequestDetail->request_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Product Id:</strong>
                            {{ $rentRequestDetail->product_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Quantity:</strong>
                            {{ $rentRequestDetail->quantity }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>From:</strong>
                            {{ $rentRequestDetail->from }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>To:</strong>
                            {{ $rentRequestDetail->to }}
                        </div>

        </div>
    </div>
</div>
@endsection
