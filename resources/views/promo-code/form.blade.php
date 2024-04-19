<div class="row">
	
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $promoCode->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('code') }}
        {{ Form::text('code', $promoCode->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code','required']) }}
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('discount_type') }}
        {{ Form::text('discount_type', $promoCode->discount_type, ['class' => 'form-control' . ($errors->has('discount_type') ? ' is-invalid' : ''), 'placeholder' => 'Discount Type','required']) }}
        {!! $errors->first('discount_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('discount_value') }}
        {{ Form::text('discount_value', $promoCode->discount_value, ['class' => 'form-control' . ($errors->has('discount_value') ? ' is-invalid' : ''), 'placeholder' => 'Discount Value','required']) }}
        {!! $errors->first('discount_value', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('valid_from') }}
        {{ Form::text('valid_from', $promoCode->valid_from, ['class' => 'form-control' . ($errors->has('valid_from') ? ' is-invalid' : ''), 'placeholder' => 'Valid From','required']) }}
        {!! $errors->first('valid_from', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('valid_until') }}
        {{ Form::text('valid_until', $promoCode->valid_until, ['class' => 'form-control' . ($errors->has('valid_until') ? ' is-invalid' : ''), 'placeholder' => 'Valid Until','required']) }}
        {!! $errors->first('valid_until', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('usage_limit') }}
        {{ Form::text('usage_limit', $promoCode->usage_limit, ['class' => 'form-control' . ($errors->has('usage_limit') ? ' is-invalid' : ''), 'placeholder' => 'Usage Limit','required']) }}
        {!! $errors->first('usage_limit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('status') }}
        {{ Form::text('status', $promoCode->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status','required']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>