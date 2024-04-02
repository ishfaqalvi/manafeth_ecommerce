<div class="row">
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $blog->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('date') }}
        {{ Form::text('date', date('m-d-Y',$blog->date) , ['class' => 'form-control date' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required']) }}
        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-2 mb-3 pt-4">
        {{ Form::checkbox('special', 'Yes', $blog->special, ['class' => 'form-check-input' . ($errors->has('special') ? ' is-invalid' : ''), 'placeholder' => 'Special','id'=>'special']) }}
        {!! $errors->first('special', '<div class="invalid-feedback">:message</div>') !!}
        {{ Form::label('special','Home Top Blog') }}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('description') }}
        {{ Form::textarea('description', $blog->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','required','rows'=>'9']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $blog->image ?? '', 'data-height' => '200', empty($blog->image) ? 'required' : '']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('detail') }}
        {{ Form::textarea('detail', $blog->detail, ['class' => 'form-control' . ($errors->has('detail') ? ' is-invalid' : ''), 'id'=>'ckeditor']) }}
        {!! $errors->first('detail', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
