@extends('admin.layout.app')

@section('title')
    {{ $maintenenceRequest->name ?? "Show Maintenence Request" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Maintenence Request Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('maintenance.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Maintenence Request</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Customer Id:</strong>
                {{ $maintenenceRequest->customer->name }}
            </div>
            <div class="form-group mb-3">
                <strong>First Name:</strong>
                {{ $maintenenceRequest->first_name }}
            </div>
            <div class="form-group mb-3">
                <strong>Last Name:</strong>
                {{ $maintenenceRequest->last_name }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $maintenenceRequest->phone_number }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $maintenenceRequest->address }}
            </div>
            <div class="form-group mb-3">
                <strong>Category Id:</strong>
                {{ $maintenenceRequest->category->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Product:</strong>
                {{ $maintenenceRequest->product->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Message:</strong>
                {{ $maintenenceRequest->message }}
            </div>
            <div class="form-group mb-3">
                <strong>Images:</strong>
                @foreach ($maintenenceRequest->images as $image)
                    <img src="{{ $image }}" width="100%"/>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
