<div class="row">
	
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('employee_id') }}
        {{ Form::text('employee_id', $task->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id','required']) }}
        {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('task_type') }}
        {{ Form::text('task_type', $task->task_type, ['class' => 'form-control' . ($errors->has('task_type') ? ' is-invalid' : ''), 'placeholder' => 'Task Type','required']) }}
        {!! $errors->first('task_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('task_id') }}
        {{ Form::text('task_id', $task->task_id, ['class' => 'form-control' . ($errors->has('task_id') ? ' is-invalid' : ''), 'placeholder' => 'Task Id','required']) }}
        {!! $errors->first('task_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('remarks') }}
        {{ Form::text('remarks', $task->remarks, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks','required']) }}
        {!! $errors->first('remarks', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('status') }}
        {{ Form::text('status', $task->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status','required']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>