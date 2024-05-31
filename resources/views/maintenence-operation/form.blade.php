<div class="row">
	
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('maintenence_request_id') }}
        {{ Form::text('maintenence_request_id', $maintenenceOperation->maintenence_request_id, ['class' => 'form-control' . ($errors->has('maintenence_request_id') ? ' is-invalid' : ''), 'placeholder' => 'Maintenence Request Id','required']) }}
        {!! $errors->first('maintenence_request_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('actor_id') }}
        {{ Form::text('actor_id', $maintenenceOperation->actor_id, ['class' => 'form-control' . ($errors->has('actor_id') ? ' is-invalid' : ''), 'placeholder' => 'Actor Id','required']) }}
        {!! $errors->first('actor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('actor_type') }}
        {{ Form::text('actor_type', $maintenenceOperation->actor_type, ['class' => 'form-control' . ($errors->has('actor_type') ? ' is-invalid' : ''), 'placeholder' => 'Actor Type','required']) }}
        {!! $errors->first('actor_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('action') }}
        {{ Form::text('action', $maintenenceOperation->action, ['class' => 'form-control' . ($errors->has('action') ? ' is-invalid' : ''), 'placeholder' => 'Action','required']) }}
        {!! $errors->first('action', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('performed_at') }}
        {{ Form::text('performed_at', $maintenenceOperation->performed_at, ['class' => 'form-control' . ($errors->has('performed_at') ? ' is-invalid' : ''), 'placeholder' => 'Performed At','required']) }}
        {!! $errors->first('performed_at', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>