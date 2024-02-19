<div class="row">
      
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('first_name') }}
        {{ Form::text('first_name', $securityGuard->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name','required']) }}
        {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('last_name') }}
        {{ Form::text('last_name', $securityGuard->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name','required']) }}
        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('preferred_name') }}
        {{ Form::text('preferred_name', $securityGuard->preferred_name, ['class' => 'form-control' . ($errors->has('preferred_name') ? ' is-invalid' : ''), 'placeholder' => 'Preferred Name','required']) }}
        {!! $errors->first('preferred_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('email') }}
        {{ Form::text('email', $securityGuard->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('licence_number') }}
        {{ Form::text('licence_number', $securityGuard->licence_number, ['class' => 'form-control' . ($errors->has('licence_number') ? ' is-invalid' : ''), 'placeholder' => 'Licence Number','required']) }}
        {!! $errors->first('licence_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('licence_expiry_date') }}
        {{ Form::text('licence_expiry_date', $securityGuard->licence_expiry_date, ['class' => 'form-control' . ($errors->has('licence_expiry_date') ? ' is-invalid' : ''), 'placeholder' => 'Licence Expiry Date','required']) }}
        {!! $errors->first('licence_expiry_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('home_address') }}
        {{ Form::text('home_address', $securityGuard->home_address, ['class' => 'form-control' . ($errors->has('home_address') ? ' is-invalid' : ''), 'placeholder' => 'Home Address','required']) }}
        {!! $errors->first('home_address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('postal_address') }}
        {{ Form::text('postal_address', $securityGuard->postal_address, ['class' => 'form-control' . ($errors->has('postal_address') ? ' is-invalid' : ''), 'placeholder' => 'Postal Address','required']) }}
        {!! $errors->first('postal_address', '<div class="invalid-feedback">:message</div>') !!}
    </div>

      <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
      </div>
</div>
