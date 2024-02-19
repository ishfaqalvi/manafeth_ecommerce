@extends('admin.layout.app')

@section('title')
    {{ $securityGuard->name ?? "{{ __('Show') Security Guard" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Security Guard Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('security-guards.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Security Guard</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>First Name:</strong>
                            {{ $securityGuard->first_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Last Name:</strong>
                            {{ $securityGuard->last_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Preferred Name:</strong>
                            {{ $securityGuard->preferred_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Email:</strong>
                            {{ $securityGuard->email }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Licence Number:</strong>
                            {{ $securityGuard->licence_number }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Licence Expiry Date:</strong>
                            {{ $securityGuard->licence_expiry_date }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Home Address:</strong>
                            {{ $securityGuard->home_address }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Postal Address:</strong>
                            {{ $securityGuard->postal_address }}
                        </div>

        </div>
    </div>
</div>
@endsection
