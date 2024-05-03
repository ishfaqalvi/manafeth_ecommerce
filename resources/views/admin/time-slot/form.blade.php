<div class="row">
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('type') }}
        {{ Form::select('type', ['Self Pickup'=>'Self Pickup','Home Delivery'=>'Home Delivery'], $timeSlot->type, ['class' => 'form-control form-select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $timeSlot->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('start_time') }}
        {{ Form::time('start_time', $timeSlot->start_time, ['class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time','required']) }}
        {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('end_time') }}
        {{ Form::time('end_time', $timeSlot->end_time, ['class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''), 'placeholder' => 'End Time','required']) }}
        {!! $errors->first('end_time', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('status') }}
        {{ Form::select('status', ['Active'=>'Active','Disable'=>'Disable'], $timeSlot->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
