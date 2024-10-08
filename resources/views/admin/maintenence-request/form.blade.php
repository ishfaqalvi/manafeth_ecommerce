<div class="fw-bold border-bottom pb-2 mb-2">Customer Detail</div>
<input type="hidden" name="lat" value="34.123"/>
<input type="hidden" name="long" value="74.123"/>
<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('customer_id','Customer') }}
        {{ Form::select('customer_id', customers(), $maintenenceRequest->customer_id, ['class' => 'form-control select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('full_name') }}
        {{ Form::text('full_name', $maintenenceRequest->full_name, ['class' => 'form-control' . ($errors->has('full_name') ? ' is-invalid' : ''), 'placeholder' => 'Full Name','required']) }}
        {!! $errors->first('full_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('phone_number') }}
        {{ Form::text('phone_number', $maintenenceRequest->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $maintenenceRequest->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="fw-bold border-bottom pb-2 mb-2">Request Detail</div>
<div class="row">
    <div class="form-group col-lg-5 mb-3">
        {{ Form::label('category_id','Category') }}
        {{ Form::select('category_id', categories(), $maintenenceRequest->category_id, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-5 mb-3">
        {{ Form::label('product_id', 'Product') }}
        {{ Form::select('product_id', [], $maintenenceRequest->product_id, ['class' => 'form-control select' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','disabled']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-2 mb-3">
        {{ Form::label('serial_number', 'Serial Number(Optional)') }}
        {{ Form::text('serial_number', $maintenenceRequest->serial_number, ['class' => 'form-control' . ($errors->has('serial_number') ? ' is-invalid' : ''), 'placeholder' => 'Serial Number','required']) }}
        {!! $errors->first('serial_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('message') }}
        {{ Form::textarea('message', $maintenenceRequest->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message','required','rows' =>'2']) }}
        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('images') }}
        {{ Form::file('images[]', ['class' => 'form-control' . ($errors->has('images') ? ' is-invalid' : ''), 'placeholder' => 'Images','required', 'multiple']) }}
        {!! $errors->first('images', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
