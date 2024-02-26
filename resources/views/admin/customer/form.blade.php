<div class="row">
    <div class="col-md-4">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => isset($customer->image) ? $customer->image : '','data-height' => '200']) }}
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('name') }}
                {{ Form::text('name', $customer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('email') }}
                {{ Form::email('email', $customer->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('mobile_number') }}
                {{ Form::text('mobile_number', $customer->mobile_number, ['class' => 'form-control' . ($errors->has('mobile_number') ? ' is-invalid' : ''), 'placeholder' => 'Mobile Number','required']) }}
                {!! $errors->first('mobile_number', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('status') }}
                {{ Form::select('status', ['Active'=>'Active','Disable'=>'Disable','Block'=>'Block'], $customer->status, ['class' => 'form-control select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('password') }}
                {{ Form::password('password',  ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password','id'=>'password']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-6 mb-3">
                {{ Form::label('confirm_password') }}
                {{ Form::password('confirm_password', ['class' => 'form-control' . ($errors->has('confirm_password') ? ' is-invalid' : ''), 'placeholder' => 'Confirm Password']) }}
                {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
    