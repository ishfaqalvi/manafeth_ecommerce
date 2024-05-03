@extends('admin.layout.app')

@section('title')
    {{ $fcmNotification->name ?? "Show Fcm Notification" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Fcm Notification Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('fcm-notifications.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Fcm Notification</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Title:</strong>
                {{ $fcmNotification->title }}
            </div>
            <div class="form-group mb-3">
                <strong>Body:</strong>
                {{ $fcmNotification->body }}
            </div>
            @if($fcmNotification->image)
            <div class="form-group mb-3">
                <strong>Image:</strong>
                <a href="{{ $fcmNotification->image }}" target="_blank">View Image</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
