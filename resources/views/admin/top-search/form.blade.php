<div class="row">
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('text') }}
        {{ Form::text('text', $topSearch->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text','required']) }}
        {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
