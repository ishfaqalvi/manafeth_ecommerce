<div class="row">
    <div class="form-group col-md-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $brand->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6 mb-3">
        {{ Form::label('website') }}
        {{ Form::text('website', $brand->website, ['class' => 'form-control' . ($errors->has('website') ? ' is-invalid' : ''), 'placeholder' => 'Website']) }}
        {!! $errors->first('website', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('logo') }}
        {{ Form::file('logo', ['class' => 'form-control dropify' . ($errors->has('logo') ? ' is-invalid' : ''), empty($brand->logo) ? 'required' : '','accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $brand->logo,'data-height' => '250']) }}
        {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>