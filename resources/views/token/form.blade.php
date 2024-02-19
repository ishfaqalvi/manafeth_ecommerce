<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('email') }}
        {{ Form::text('email', $token->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('otp') }}
        {{ Form::text('otp', $token->otp, ['class' => 'form-control' . ($errors->has('otp') ? ' is-invalid' : ''), 'placeholder' => 'Otp','required']) }}
        {!! $errors->first('otp', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('expiry_time') }}
        {{ Form::text('expiry_time', $token->expiry_time, ['class' => 'form-control' . ($errors->has('expiry_time') ? ' is-invalid' : ''), 'placeholder' => 'Expiry Time','required']) }}
        {!! $errors->first('expiry_time', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('used') }}
        {{ Form::text('used', $token->used, ['class' => 'form-control' . ($errors->has('used') ? ' is-invalid' : ''), 'placeholder' => 'Used','required']) }}
        {!! $errors->first('used', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
