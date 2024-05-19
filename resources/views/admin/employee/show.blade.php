@extends('admin.layout.app')

@section('title')
    {{ $employee->name ?? "Show Employee" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Employee Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('employees.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Employee</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                {{ $employee->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $employee->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Status:</strong>
                {{ $employee->status }}
            </div>
            <div class="form-group mb-3">
                <strong>Roles:</strong>
                @foreach ($employee->roles as $role)
                <span class="badge bg-primary rounded-pill">{{ $role }}</span>
                @endforeach
            </div>
            <div class="form-group mb-3">
                <strong>Image:</strong>
                <img src="{{ $employee->image }}">
            </div>
        </div>
    </div>
</div>
@endsection
