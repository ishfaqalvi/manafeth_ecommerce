<div class="row">
	
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('orderable_id') }}
        {{ Form::text('orderable_id', $payment->orderable_id, ['class' => 'form-control' . ($errors->has('orderable_id') ? ' is-invalid' : ''), 'placeholder' => 'Orderable Id','required']) }}
        {!! $errors->first('orderable_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('orderable_type') }}
        {{ Form::text('orderable_type', $payment->orderable_type, ['class' => 'form-control' . ($errors->has('orderable_type') ? ' is-invalid' : ''), 'placeholder' => 'Orderable Type','required']) }}
        {!! $errors->first('orderable_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('total_amount') }}
        {{ Form::text('total_amount', $payment->total_amount, ['class' => 'form-control' . ($errors->has('total_amount') ? ' is-invalid' : ''), 'placeholder' => 'Total Amount','required']) }}
        {!! $errors->first('total_amount', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('payment_method') }}
        {{ Form::text('payment_method', $payment->payment_method, ['class' => 'form-control' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => 'Payment Method','required']) }}
        {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('created_by') }}
        {{ Form::text('created_by', $payment->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By','required']) }}
        {!! $errors->first('created_by', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('created_by_type') }}
        {{ Form::text('created_by_type', $payment->created_by_type, ['class' => 'form-control' . ($errors->has('created_by_type') ? ' is-invalid' : ''), 'placeholder' => 'Created By Type','required']) }}
        {!! $errors->first('created_by_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>