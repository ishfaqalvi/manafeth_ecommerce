@extends('admin.layout.app')

@section('title')
{{ __('Create') }} Product
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Product Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('products.maintenance.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Create') }} Product</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.maintenance.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="Maintenance">
                <div class="row">
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('brand') }}
                        {{ Form::select('brand_id', brands(), $product->brand_id, ['class' => 'form-control select' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('category') }}
                        {{ Form::select('category_id', categories(), $product->category_id, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('sub_category') }}
                        {{ Form::select('sub_category_id', [], $product->sub_category_id, ['class' => 'form-control select' . ($errors->has('sub_category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','default' => $product->sub_category_id,'disabled']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('name') }}
                        {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('serial_number') }}
                        {{ Form::text('serial_number', $product->serial_number, ['class' => 'form-control' . ($errors->has('serial_number') ? ' is-invalid' : ''), 'placeholder' => 'Serial Number','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('engine_number') }}
                        {{ Form::text('engine_number', $product->engine_number, ['class' => 'form-control' . ($errors->has('engine_number') ? ' is-invalid' : ''), 'placeholder' => 'Engine Number','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('model') }}
                        {{ Form::text('model', $product->model, ['class' => 'form-control' . ($errors->has('model') ? ' is-invalid' : ''), 'placeholder' => 'Model Number','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('quantity') }}
                        {{ Form::number('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','min'=>'0','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('price') }}
                        {{ Form::number('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('discount') }}
                        {{ Form::number('discount', $product->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('status') }}
                        {{ Form::select('status', ['Publish' => 'Publish', 'Unpublish' => 'Unpublish'], $product->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        {{ Form::label('special','Home Top Product') }}
                        {{ Form::select('special', ['Yes' => 'Yes', 'No' => 'No'], $product->special, ['class' => 'form-control form-select' . ($errors->has('special') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                    </div>
                    <div class="form-group col-lg-12 mb-3">
                        {{ Form::label('description') }}
                        {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        {{ Form::label('thumbnail') }}
                        {{ Form::file('thumbnail', ['class' => 'form-control dropify' . ($errors->has('thumbnail') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $product->thumbnail, isset($product->thumbnail) ? '' : 'required','data-height' => '225']) }}
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        {{ Form::label('detail') }}
                        {{ Form::textarea('detail', $product->detail, ['class' => 'form-control' . ($errors->has('detail') ? ' is-invalid' : ''), 'placeholder' => 'Detail','required']) }}
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
        $(".select").select2();
        $('.dropify').dropify();
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
        $('select[name=category_id]').change(function () {
            let id = $(this).val();
            $('select[name=sub_category_id]').html('<option value="">--Select--</option>');
            $('select[name=sub_category_id]').attr('disabled',false);
            $.get('/admin/categories/sub-categories', {id: id}).done(function (result) {
                let data = JSON.parse(result);
                $.each(data, function (i, val) {
                    $('select[name=sub_category_id]').append($('<option></option>').val(val.id).html(val.name));
                })
            });
        });
    });
</script>
@endsection
