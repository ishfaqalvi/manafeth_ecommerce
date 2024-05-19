@extends('admin.layout.app')

@section('title')
    {{ $order->name ?? "Show Order" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Order Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Products Detail</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th colspan="2">Product name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                        @foreach($order->details as $key => $row)
                        @php($product = $row->product)
                        @php($amount = $row->quantity*$row->price)
                        @php($total += $amount)
                        <tr>
                            <td class="pe-0" style="width: 45px;">
                                <a href="#">
                                    <img src="{{ $product->thumbnail }}" height="60" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="#" class="d-block fw-semibold">
                                    {{ Str::limit($product->name, 30) }}
                                </a>
                                <div class="d-inline-flex align-items-center text-muted fs-sm">
                                    <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                    {{ $product->brand->name ?? "" }}
                                </div>
                            </td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ number_format($amount) }}</td>
                        </tr>
                        @endforeach
                        <tr class="table-light">
                            <td colspan="4" class="fw-semibold">Total Amount</td>
                            <td class="text-end">{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Customer Detail</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                {{ $order->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $order->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $order->phone_number }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $order->address }}
            </div>
        </div>
    </div>
</div>
@endsection
