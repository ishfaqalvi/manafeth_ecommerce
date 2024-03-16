<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="form-group mb-3">
                {{ Form::label('type') }}
                {{ Form::select('type', ['Sale'=>'Sale','Rent'=>'Rent','Maintenance'=>'Maintenance'], $banner->type, ['class' => 'form-control form-select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group mb-3">
                {{ Form::label('title') }}
                {{ Form::text('title', $banner->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6 mb-3">
                {{ Form::label('order') }}
                {{ Form::number('order', $banner->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order','required']) }}
                {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6 mb-3">
                {{ Form::label('status') }}
                {{ Form::select('status', ['Active'=>'Active','Inactive'=>'Inactive'],$banner->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $banner->image, 'data-height' => '200', isset($banner->image) ? '' : 'required']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
