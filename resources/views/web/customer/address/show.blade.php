@extends('admin.layout.app')

@section('title')
    {{ $address->name ?? "Show Address" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Address Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('addresses.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Address</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Customer Id:</strong>
                            {{ $address->customer_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Full Name:</strong>
                            {{ $address->full_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Address Line1:</strong>
                            {{ $address->address_line1 }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Address Line2:</strong>
                            {{ $address->address_line2 }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>City:</strong>
                            {{ $address->city }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>State:</strong>
                            {{ $address->state }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Postal Code:</strong>
                            {{ $address->postal_code }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Country:</strong>
                            {{ $address->country }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Phone Number:</strong>
                            {{ $address->phone_number }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Email Address:</strong>
                            {{ $address->email_address }}
                        </div>

        </div>
    </div>
</div>
@endsection