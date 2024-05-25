<div class="fw-bold border-bottom pb-2 mb-2">Order Detail</div>
<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('customer') }}
        {{ Form::select('customer_id', customers(), $order->customer_id, ['class' => 'form-control select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('payment_method') }}
        {{ Form::select('payment_method', ['Cash On Delivery' => 'Cash On Delivery'], $order->payment_method, ['class' => 'form-control select' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('collection_date') }}
        {{ Form::text('collection_date', $order->collection_date, ['class' => 'form-control collection_date' . ($errors->has('collection_date') ? ' is-invalid' : ''), 'placeholder' => 'Collection Date','required', 'id' =>'collection_date']) }}
        {!! $errors->first('collection_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('collection_type') }}
        {{ Form::select('collection_type', ['Self Pickup' => 'Self Pickup','Home Delivery' => 'Home Delivery'], $order->collection_type, ['class' => 'form-control select' . ($errors->has('collection_type') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('collection_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('time_slot') }}
        {{ Form::select('time_slot_id', [], $order->time_slot_id, ['class' => 'form-control select' . ($errors->has('time_slot_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('time_slot_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="fw-bold border-bottom pb-2 mb-2">Delivery Detail</div>
<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('name','Contact Person Name') }}
        {{ Form::text('name', $order->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('email') }}
        {{ Form::email('email', $order->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('phone_number', 'Contact Number') }}
        {{ Form::text('phone_number', $order->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
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
