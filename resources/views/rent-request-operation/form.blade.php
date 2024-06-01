<div class="row">
	
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('rent_request_id') }}
        {{ Form::text('rent_request_id', $rentRequestOperation->rent_request_id, ['class' => 'form-control' . ($errors->has('rent_request_id') ? ' is-invalid' : ''), 'placeholder' => 'Rent Request Id','required']) }}
        {!! $errors->first('rent_request_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('actor_id') }}
        {{ Form::text('actor_id', $rentRequestOperation->actor_id, ['class' => 'form-control' . ($errors->has('actor_id') ? ' is-invalid' : ''), 'placeholder' => 'Actor Id','required']) }}
        {!! $errors->first('actor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('actor_type') }}
        {{ Form::text('actor_type', $rentRequestOperation->actor_type, ['class' => 'form-control' . ($errors->has('actor_type') ? ' is-invalid' : ''), 'placeholder' => 'Actor Type','required']) }}
        {!! $errors->first('actor_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('action') }}
        {{ Form::text('action', $rentRequestOperation->action, ['class' => 'form-control' . ($errors->has('action') ? ' is-invalid' : ''), 'placeholder' => 'Action','required']) }}
        {!! $errors->first('action', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('performed_at') }}
        {{ Form::text('performed_at', $rentRequestOperation->performed_at, ['class' => 'form-control' . ($errors->has('performed_at') ? ' is-invalid' : ''), 'placeholder' => 'Performed At','required']) }}
        {!! $errors->first('performed_at', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>