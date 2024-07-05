@extends('admin.layout.app')

@section('title')
    {{ $rentRequest->name ?? "Show Rent Request" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Request Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('rent.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Rental Products Detail</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Product name</th>
                        <th>Quantity</th>
                        <th>Period</th>
                        <th>Rent Amount</th>
                        <th>Delivery Charges</th>
                        <th>Discount</th>
                        <th>Sub Total</th>
                        <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @php($total = 0)
                    @foreach($rentRequest->details as $key => $row)
                    @php($product = $row->product)
                    @php($subTotal = ($row->productRent->amount * $row->quantity) + ($row->deliver_charges ?? 0) - ($row->discount ?? 0))
                    @php($total += $subTotal)
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
                        <td>{{ date('d M Y', $row->from) .' => '.date('d M Y', $row->to) }}</td>
                        <td>{{ number_format($row->productRent->amount) }}</td>
                        <td>{{ number_format($row->deliver_charges) }}</td>
                        <td>{{ number_format($row->discount) }}</td>
                        <td>{{ number_format($subTotal) }}</td>
                        <td>
                            @if(is_null($row->date_extend))
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" data-id="{{ $row->id }}" data-date="{{ date('Y-m-d', $row->to) }}" data-productid="{{ $row->product_id }}" class="dropdown-item extendDate">
                                            <i class="ph-calendar-check me-2"></i>{{ __('Date Extend') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr class="table-light">
                        <td colspan="8" class="fw-semibold">Total Amount</td>
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
                    @foreach($rentRequest->operations as $key => $row)
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
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Order Info</h5>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <strong>Payment Method:</strong>
                {{ $rentRequest->payment_method }}
            </div>
            <div class="form-group mb-3">
                <strong>Collection Date:</strong>
                {{ date('d M Y',$rentRequest->collection_date) }}
            </div>
            <div class="form-group mb-3">
                <strong>Collection Type:</strong>
                {{ $rentRequest->collection_type }}
            </div>
            <div class="form-group mb-3">
                <strong>Time Slot:</strong>
                    {{ Carbon\Carbon::parse($rentRequest->timeSlot->start_time)->format('g:i A'). ' / '. Carbon\Carbon::parse($rentRequest->timeSlot->end_time)->format('h:i A') }}
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
                {{ $rentRequest->customer->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $rentRequest->customer->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $rentRequest->customer->mobile_number }}
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
                {{ $rentRequest->name }}
            </div>
            <div class="form-group mb-3">
                <strong>Email:</strong>
                {{ $rentRequest->email }}
            </div>
            <div class="form-group mb-3">
                <strong>Phone Number:</strong>
                {{ $rentRequest->phone_number }}
            </div>
            <div class="form-group mb-3">
                <strong>Address:</strong>
                {{ $rentRequest->address }}
            </div>
        </div>
    </div>
</div>
<div id="extendDate" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('rent.dateExtend') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Extend Rent Last Date') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null, ['id' => 'row-id']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('product_rent_id','Rents') }}
                            {{ Form::select('product_rent_id', [], null, ['class' => 'form-control select' . ($errors->has('product_rent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required', 'id' => 'product-rents']) }}
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            {{ Form::label('to', 'To Date') }}
                            {{ Form::date('to', null, ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : '') ,'required','id' =>'order-to-id']) }}
                        </div>
                        <div class="form-group col-lg-12">
                            {{ Form::label('discount') }}
                            {{ Form::number('discounts', 0, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount', 'min' => '0']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submitt</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        function getValidationSettings(additionalSettings) {
            var commonSettings = {
                errorClass: 'validation-invalid-label',
                successClass: 'validation-valid-label',
                validClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                    $(element).addClass('is-invalid');
                    $(element).removeClass('is-valid');
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                errorPlacement: function(error, element) {
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.appendTo(element.parent());
                    } else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            };
            return $.extend(commonSettings, additionalSettings);
        }
        $('.extendDate').click(function(){
            $('#row-id').val($(this).data('id'));
            $('#order-to-id').val($(this).data('date'));
            var productId = $(this).data('productid');
            var rentsDropdown = $('#product-rents');
            $('#product-id').val(productId);
            rentsDropdown.html('<option>--Select--</option>');
            $.get("{{ route('rent.getRents') }}", {product_id: productId}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function(index, rent) {
                    rentsDropdown.append('<option value="' + rent.id + '">' + rent.title + ' (' + rent.amount + ')</option>');
                })
            });
            $('#extendDate').modal('show');
        });
        $('.validate').validate(getValidationSettings({}));
    });
</script>
@endsection
