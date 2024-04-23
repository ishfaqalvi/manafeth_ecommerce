<div class="row">
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), empty($category->image) ? 'required' : '','accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $category->image,'data-height' => '250']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('banner') }}
        {{ Form::file('banner', ['class' => 'form-control dropify' . ($errors->has('banner') ? ' is-invalid' : ''), empty($category->banner) ? 'required' : '','accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $category->banner,'data-height' => '250']) }}
        {!! $errors->first('banner', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>