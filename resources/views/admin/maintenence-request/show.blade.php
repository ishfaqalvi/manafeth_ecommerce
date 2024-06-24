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
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Product Detail</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Product name</th>
                        <th>Category</th>
                        <th>Serial #</th>
                    </tr>
                </thead>
                <tbody>
                    @php($product = $maintenenceRequest->product)
                    <tr>
                        <td class="pe-0" style="width: 45px;">
                            <a href="{{ route('products.sale.show',$product->id) }}">
                                <img src="{{ $product->thumbnail }}" height="60" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('products.sale.show',$product->id) }}" class="d-block fw-semibold">
                                {{ Str::limit($product->name, 30) }}
                            </a>
                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                {{ $product->brand->name ?? "" }}
                            </div>
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->serial_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        @foreach ($maintenenceRequest->images as $image)
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-img-actions m-1">
                    <img class="card-img img-fluid" src="{{ $image }}" alt="">
                    <div class="card-img-actions-overlay card-img">
                        <a href="{{ $image }}" class="btn btn-outline-white btn-icon rounded-pill" data-bs-popup="lightbox" data-gallery="gallery1">
                            <i class="ph-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Order Action Logs</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Actions</th>
                        <th>Performed At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintenenceRequest->operations as $key => $row)
                    <tr>
                        <td>{{ substr($row->actor_type, 11) }}</td>
                        <td>{{ $row->actor->name }}</td>
                        <td>{{ $row->action }}</td>
                        <td>{{ $row->performed_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Order Tasks</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Remarks</th>
                        <th>Attachment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintenenceRequest->tasks as $key => $row)
                    <tr>
                        <td>{{ $row->employee->name }}</td>
                        <td>{{ $row->remarks }}</td>
                        <td>
                            @foreach($row->images as $image)
                                <a href="{{ $image }}" target="_blank">View File</a></br>
                            @endforeach
                        </td>
                        <td>{{ $row->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Request Info</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Request #:</strong>
                {{ $maintenenceRequest->request_no }}
            </div>
            <div class="form-group mb-3">
                <strong>Category:</strong>
                {{ $maintenenceRequest->category->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Message:</strong>
                {{ $maintenenceRequest->message }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Customer Detail</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                {{ $maintenenceRequest->customer->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $maintenenceRequest->customer->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $maintenenceRequest->customer->mobile_number }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Delivery Detail</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                {{ $maintenenceRequest->full_name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $maintenenceRequest->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $maintenenceRequest->phone_number }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $maintenenceRequest->address }}
            </div>
        </div>
    </div>
</div>
@endsection
