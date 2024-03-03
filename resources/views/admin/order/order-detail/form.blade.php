<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('order_id') }}
        {{ Form::text('order_id', $orderDetail->order_id, ['class' => 'form-control' . ($errors->has('order_id') ? ' is-invalid' : ''), 'placeholder' => 'Order Id','required']) }}
        {!! $errors->first('order_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_id') }}
        {{ Form::text('product_id', $orderDetail->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id','required']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('quantity') }}
        {{ Form::text('quantity', $orderDetail->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('price') }}
        {{ Form::text('price', $orderDetail->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price','required']) }}
        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
