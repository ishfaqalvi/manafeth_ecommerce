<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('request_id') }}
        {{ Form::text('request_id', $rentRequestDetail->request_id, ['class' => 'form-control' . ($errors->has('request_id') ? ' is-invalid' : ''), 'placeholder' => 'Request Id','required']) }}
        {!! $errors->first('request_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('product_id') }}
        {{ Form::text('product_id', $rentRequestDetail->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id','required']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('quantity') }}
        {{ Form::text('quantity', $rentRequestDetail->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('from') }}
        {{ Form::text('from', $rentRequestDetail->from, ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : ''), 'placeholder' => 'From','required']) }}
        {!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('to') }}
        {{ Form::text('to', $rentRequestDetail->to, ['class' => 'form-control' . ($errors->has('to') ? ' is-invalid' : ''), 'placeholder' => 'To','required']) }}
        {!! $errors->first('to', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
