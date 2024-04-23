<div class="row">
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('category') }}
        {{ Form::select('category_id', categories('Rent'), $category->category_id, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
    </div>
    <div class="form-group col-lg-12">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), empty($category->image) ? 'required' : '','accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $category->image,'data-height' => '250']) }}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>