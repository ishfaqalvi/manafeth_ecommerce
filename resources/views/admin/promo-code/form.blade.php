<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $promoCode->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('code') }}
        {{ Form::text('code', $promoCode->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code','required']) }}
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('discount_type') }}
        {{ Form::select('discount_type', ['Percentage'=>'Percentage','Fixed Amount'=>'Fixed Amount'], $promoCode->discount_type, ['class' => 'form-control form-select' . ($errors->has('discount_type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('discount_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('discount_value') }}
        {{ Form::number('discount_value', $promoCode->discount_value, ['class' => 'form-control' . ($errors->has('discount_value') ? ' is-invalid' : ''), 'placeholder' => 'Discount Value', 'min' => '0','required']) }}
        {!! $errors->first('discount_value', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('valid_from') }}
        {{ Form::text('valid_from', isset($promoCode->valid_from) ? date('m-d-Y', $promoCode->valid_from) : '', ['class' => 'form-control valid_from' . ($errors->has('valid_from') ? ' is-invalid' : ''), 'placeholder' => 'Valid From','required']) }}
        {!! $errors->first('valid_from', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('valid_until') }}
        {{ Form::text('valid_until', isset($promoCode->valid_until) ? date('m-d-Y', $promoCode->valid_until) : '', ['class' => 'form-control valid_until' . ($errors->has('valid_until') ? ' is-invalid' : ''), 'placeholder' => 'Valid Until','required']) }}
        {!! $errors->first('valid_until', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('usage_limit') }}
        {{ Form::number('usage_limit', $promoCode->usage_limit, ['class' => 'form-control' . ($errors->has('usage_limit') ? ' is-invalid' : ''), 'placeholder' => 'Usage Limit','min' => '1', 'required']) }}
        {!! $errors->first('usage_limit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('status') }}
        {{ Form::select('status', ['Active'=>'Active','Inactive'=>'Inactive'], $promoCode->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>