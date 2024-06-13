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
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Serial #</th>
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
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ number_format($amount) }}</td>
                        <td>{{ $row->serial_number }}</td>
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
                    @foreach($order->operations as $key => $row)
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
            <h5 class="mb-0">Product Services</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                @foreach ($order->details as $details)
                    <thead>
                        <tr class="table-light">
                            <td colspan="3" class="fw-semibold">{{ $product->name }}</td>
                            <td class="text-end">{{ count($details->services) }}</td>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($nextPendingEditable = true)
                        @forelse($details->services as $key => $row)
                        <tr>
                            <td>{{ 'Service '. ++$key }}</td>
                            <td>{{ date('d M Y', $row->date) }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if($row->status == 'Pending' &&$nextPendingEditable )
                                    @php($nextPendingEditable = false)
                                    <form action="{{ route('orders.services') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <a href="#" class="sa-confirm"><i class="ph-note-pencil text-info"></i></a>
                                    </form>
                                @else
                                    @if($row->status == 'Pending')
                                        <i class="ph-note-pencil text-muted"></i>
                                    @else
                                        <i class="ph-calendar-check text-success"></i>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="table-light">
                            <td class="text-center" colspan="4">No record found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Order Info</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Invoice #:</strong>
                {{ $order->invoice_no }}
            </div>
            <div class="form-group mb-3">
                <strong>Payment Method:</strong>
                {{ $order->payment_method }}
            </div>
            <div class="form-group mb-3">
                <strong>Collection Date:</strong>
                {{ date('d M Y',$order->collection_date) }}
            </div>
            <div class="form-group mb-3">
                <strong>Collection Type:</strong>
                {{ $order->collection_type }}
            </div>
            <div class="form-group mb-3">
                <strong>Time Slot:</strong>
                    {{ Carbon\Carbon::parse($order->timeSlot->start_time)->format('g:i A'). ' / '. Carbon\Carbon::parse($order->timeSlot->end_time)->format('h:i A') }}
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
                {{ $order->customer->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $order->customer->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $order->customer->mobile_number }}
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

@section('script')
<script>
    $(function () {
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection
