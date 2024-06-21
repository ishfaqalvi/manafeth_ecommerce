<div id="maintenenceboymodel" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('maintenance.update') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Assign Request to Maintenence Boy') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null,['id' => 'request-id']) }}
                        {{ Form::hidden('status', 'Assigned') }}
                        <div class="form-group">
                            {{ Form::label('serial_number', 'Serial Number(Optional)') }}
                            {{ Form::text('serial_number', null, ['class' => 'form-control' . ($errors->has('serial_number') ? ' is-invalid' : ''), 'placeholder' => 'Serial Number','required','id' => 'request-serial-number']) }}
                        </div>
                        <div class="form-group mb-3">
                            {{ Form::label('maintenenceboy','Maintenence Boys') }}
                            {{ Form::select('maintenenceboy', maintenenceBoys(true), null, ['class' => 'form-control form-select' . ($errors->has('maintenenceboy') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submitt</button>
                </div>
            </form>
        </div>
    </div>
</div>
