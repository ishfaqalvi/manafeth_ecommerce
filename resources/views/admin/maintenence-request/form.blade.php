<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('customer_id') }}
        {{ Form::text('customer_id', $maintenenceRequest->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => 'Customer Id','required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('first_name') }}
        {{ Form::text('first_name', $maintenenceRequest->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name','required']) }}
        {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('last_name') }}
        {{ Form::text('last_name', $maintenenceRequest->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name','required']) }}
        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('phone_number') }}
        {{ Form::text('phone_number', $maintenenceRequest->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $maintenenceRequest->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('category_id') }}
        {{ Form::text('category_id', $maintenenceRequest->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id','required']) }}
        {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_id') }}
        {{ Form::text('product_id', $maintenenceRequest->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id','required']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('message') }}
        {{ Form::text('message', $maintenenceRequest->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message','required']) }}
        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('images') }}
        {{ Form::text('images', $maintenenceRequest->images, ['class' => 'form-control' . ($errors->has('images') ? ' is-invalid' : ''), 'placeholder' => 'Images','required']) }}
        {!! $errors->first('images', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
