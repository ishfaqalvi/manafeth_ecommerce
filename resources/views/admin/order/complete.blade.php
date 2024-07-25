@extends('admin.layout.app')

@section('title')
{{ __('Update') }} Order
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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Update') }} Order</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('orders.completed') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="Completed">
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        {{ Form::label('invoice') }}
                        {{ Form::file('invoice', ['class' => 'form-control' . ($errors->has('invoice') ? ' is-invalid' : ''),'required']) }}
                        {!! $errors->first('invoice', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        {{ Form::label('invoice_no') }}
                        {{ Form::text('invoice_no', $order->invoice_no, ['class' => 'form-control' . ($errors->has('invoice_no') ? ' is-invalid' : ''),'required']) }}
                        {!! $errors->first('invoice_no', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-12 mb-3">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th colspan="2">Product name</th>
                                    <th>Quantity</th>
                                    <th>Serial Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->details as $detail)
                                    @php($product = $detail->product)
                                    <input type="hidden" name="ids[]" value="{{ $detail->id }}">
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
                                        <td class="p-1">{{ $detail->quantity }}</td>
                                        <td class="p-1">
                                            {{ Form::text('serial_number[]', $detail->serial_number, ['class' => 'form-control' . ($errors->has('maintenance') ? ' is-invalid' : ''), 'placeholder' => 'Serial Number','required']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
                        <button type="submit" class="btn btn-primary ms-3">
                            Submit <i class="ph-paper-plane-tilt ms-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $('.select').select2();
        $('.validate').validate({
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
                }else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection
