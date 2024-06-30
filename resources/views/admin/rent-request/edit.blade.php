@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Rent Request
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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Edit ') }} Rent Request </h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('rent.update') }}" class="validate"   role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                <input type="hidden" name="status" value="Confirmed">
                @foreach($rentRequest->details as $detail)
                    @php($product = $detail->product)
                    <input type="hidden" name="ids[]" value="{{ $detail->id }}">
                    <div class="fw-bold border-bottom pb-2 mb-2">{{ $product->name }}</div>
                    <div class="row">
                        <div class="form-group col-lg-4 mb-3">
                            {{ Form::label('product_rent_id', 'Rent') }}
                            <select class="form-control form-select" name="product_rent_id[]" required>
                                @foreach($product->rents as $row)
                                    <option value="{{ $row->id}}" {{ $row->id == $detail->product_rent_id ? 'selected' : ''}}>{{ $row->title .' ('. $row->amount.')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            {{ Form::label('from','From Date') }}
                            {{ Form::date('from[]', date('Y-m-d', $detail->from), ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : ''), 'placeholder' => 'From','required']) }}
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            {{ Form::label('to','To Date') }}
                            {{ Form::date('to[]', date('Y-m-d', $detail->to), ['class' => 'form-control' . ($errors->has('to') ? ' is-invalid' : ''), 'placeholder' => 'To','required']) }}
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            {{ Form::label('delivery_charges') }}
                            {{ Form::number('delivery_charges[]', $detail->delivery_charges, ['class' => 'form-control' . ($errors->has('delivery_charges') ? ' is-invalid' : ''), 'placeholder' => 'Delivery Charges', 'min' => '0']) }}
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            {{ Form::label('discount') }}
                            {{ Form::number('discounts[]', $detail->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount', 'min' => '0']) }}
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
                    <button type="submit" class="btn btn-primary ms-3">
                        Submit <i class="ph-paper-plane-tilt ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
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
