<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('customer_id') }}
        {{ Form::text('customer_id', $order->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => 'Customer Id','required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $order->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('email') }}
        {{ Form::text('email', $order->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('phone_number') }}
        {{ Form::text('phone_number', $order->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $order->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
