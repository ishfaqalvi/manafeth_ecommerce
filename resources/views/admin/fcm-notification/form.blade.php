<div class="row">
    <div class="col-md-6">
        <div class="form-group col-lg-12 mb-2">
            {{ Form::label('topic') }}
            {{ Form::select('topic', topics(), $fcmNotification->topic, ['class' => 'form-control form-select' . ($errors->has('topic') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-12 mb-2">
            {{ Form::label('title') }}
            {{ Form::text('title', $fcmNotification->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-lg-12">
            {{ Form::label('body') }}
            {{ Form::textarea('body', $fcmNotification->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body','required','rows'=>'2']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $fcmNotification->image ?? '', 'data-height' => '200']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
