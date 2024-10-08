@extends('admin.layout.app')

@section('title','Show Customer')

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Customer Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('customers.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
<div class="col-md-12 px-0">
    <div class="profile-cover">
        <div class="profile-cover-img" style="background-image: url(../../../assets/images/demo/carousel/1.jpg)"></div>
        <div class="d-flex align-items-center text-center text-lg-start flex-column flex-lg-row position-absolute start-0 end-0 bottom-0 mx-3 mb-3">
            <div class="me-lg-3 mb-2 mb-lg-0">
                <a href="#">
                    <img src="{{ $customer->image }}" class="img-thumbnail rounded-circle shadow" width="100" height="100" alt="">
                </a>
            </div>
            <div class="profile-cover-text text-white">
                <h1 class="mb-0">{{ $customer->name }}</h1>
                <span class="d-block">{{ $customer->mobile_number }}</span>
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-lg border-bottom py-2">
        <div class="container-fluid">
            <ul class="nav navbar-nav flex-row flex-fill">
                <li class="nav-item me-1">
                    <a href="#sale" class="navbar-nav-link navbar-nav-link-icon active rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-shopping-cart"></i>
                            <span class="d-none d-lg-inline-block ms-2">Sale Orders</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item me-1">
                    <a href="#rent" class="navbar-nav-link navbar-nav-link-icon rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-buildings"></i>
                            <span class="d-none d-lg-inline-block ms-2">Rent Orders</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item me-1">
                    <a href="#maintenance" class="navbar-nav-link navbar-nav-link-icon rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-lifebuoy"></i>
                            <span class="d-none d-lg-inline-block ms-2">Maintenance Requests</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="content px-0">
    <div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row">
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="sale">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="mb-0">Sale Orders</h5>
                            <div class="ms-auto my-auto">
                                <a href="{{ route('customers.exportSaleOrder', $customer->id)}}" class="btn btn-outline-indigo">Export</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice #</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Task</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($customer->orders as $key => $order)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ Carbon\Carbon::parse($order->created_at)->toDateString() }}</td>
                                        <td>{{ Carbon\Carbon::parse($order->created_at)->toTimeString() }}</td>
                                        <td>
                                            @if (!is_null($order->task))
                                                {{ $order->task->status." By ". $order->task->employee_service }}
                                            @endif
                                        </td>
                                        <td>{{ $order->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('orders.show',$order->id) }}" class="btn btn-sm btn-primary">
                                                <i class="ph-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="rent">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="mb-0">Rent Requests</h5>
                            <div class="ms-auto my-auto">
                                <a href="{{ route('customers.exportRentOrder', $customer->id)}}" class="btn btn-outline-indigo">Export</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone #</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Task</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($customer->rentRequests as $key => $rentRequest)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $rentRequest->name }}</td>
                                        <td>{{ $rentRequest->phone_number }}</td>
                                        <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toDateString() }}</td>
                                        <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toTimeString() }}</td>
                                        <td>
                                            @if (!is_null($rentRequest->task))
                                                {{ $rentRequest->task->status." By ". $rentRequest->task->employee_service }}
                                            @endif
                                        </td>
                                        <td>{{ $rentRequest->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('rent.show',$rentRequest->id) }}" class="btn btn-sm btn-primary">
                                                <i class="ph-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="maintenance">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="mb-0">Maintenence Request</h5>
                            <div class="ms-auto my-auto">
                                <a href="{{ route('customers.exportMaintenenceOrder', $customer->id)}}" class="btn btn-outline-indigo">Export</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone #</th>
                                        <th>Charges</th>
                                        <th>Collected</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Task</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($customer->maintenenceRequests as $key => $maintenenceRequest)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $maintenenceRequest->full_name }}</td>
                                        <td>{{ $maintenenceRequest->phone_number }}</td>
                                        <td>{{ number_format($maintenenceRequest->payment) }}</td>
                                        <td>{{ number_format($maintenenceRequest->payments()->sum('amount')) }}</td>
                                        <td>{{ Carbon\Carbon::parse($maintenenceRequest->created_at)->toDateString() }}</td>
                                        <td>{{ Carbon\Carbon::parse($maintenenceRequest->created_at)->toTimeString() }}</td>
                                        <td>
                                            @if (!is_null($maintenenceRequest->task))
                                                {{ $maintenenceRequest->task->status." By ". $maintenenceRequest->task->employee_service }}
                                            @endif
                                        </td>
                                        <td>{{ $maintenenceRequest->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('maintenance.show',$maintenenceRequest->id) }}" class="btn btn-sm btn-primary">
                                                <i class="ph-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
