@extends('admin.layout.app')

@section('title')
    {{ $rentLink->name ?? "Show Rent Link" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Link Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('links.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Rent Link</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Title:</strong>
                {{ $rentLink->title }}
            </div>
            <div class="form-group mb-3">
                <strong>Product:</strong>
                {{ $rentLink->product->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Product Rent:</strong>
                {{ $rentLink->productRent->title }}
            </div>
            <div class="form-group mb-3">
                <strong>Quantity:</strong>
                {{ $rentLink->quantity }}
            </div>
            <div class="form-group mb-3">
                <strong>From:</strong>
                {{ date('d M Y', $rentLink->from) }}
            </div>
            <div class="form-group mb-3">
                <strong>To:</strong>
                {{ date('d M Y', $rentLink->to) }}
            </div>
            @if($rentLink->price_change_type)
            <div class="form-group mb-3">
                <strong>Price Change Type:</strong>
                {{ ucfirst($rentLink->price_change_type) }}
            </div>
            <div class="form-group mb-3">
                <strong>Price Change Value:</strong>
                {{ number_format($rentLink->price_change_value) }}
            </div>
            @endif
            <div class="form-group mb-3">
                <strong>Collection Date:</strong>
                {{ $rentLink->collection_date }}
            </div>
            <div class="form-group mb-3">
                <strong>Collection Type:</strong>
                {{ $rentLink->collection_type }}
            </div>
            <div class="form-group mb-3">
                <strong>Time Slot:</strong>
                {{ $rentLink->timeSlot->name.'('.$rentLink->timeSlot->start_time.'/'.$rentLink->timeSlot->end_time. ')' }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $rentLink->address }}
            </div>
        </div>
    </div>
</div>
@endsection
