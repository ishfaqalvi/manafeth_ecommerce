<div class="row">
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $rentLink->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_id','Products') }}
        {{ Form::select('product_id', $products, $rentLink->product_id, ['class' => 'form-control select' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','id' => 'product-select']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_rent_id', 'Rent') }}
        {{ Form::select('product_rent_id', [], $rentLink->product_rent_id, ['class' => 'form-control select' . ($errors->has('product_rent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required', 'id' => 'rent-select', 'default' => $rentLink->product_rent_id]) }}
        {!! $errors->first('product_rent_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('quantity') }}
        {{ Form::number('quantity', $rentLink->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required', 'min' => '1']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('from') }}
        {{ Form::text('from', $rentLink->from, ['class' => 'form-control from_date' . ($errors->has('from') ? ' is-invalid' : ''), 'placeholder' => 'From','required']) }}
        {!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('to') }}
        {{ Form::text('to', $rentLink->to, ['class' => 'form-control to_date' . ($errors->has('to') ? ' is-invalid' : ''), 'placeholder' => 'To','required']) }}
        {!! $errors->first('to', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
