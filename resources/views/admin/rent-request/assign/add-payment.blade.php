<div id="addpaymentmodel" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('rent.update') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Request Payment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null,['id' => 'rent-request-id']) }}
                        {{ Form::hidden('status', 'Add Payment') }}
                        <div class="form-group">
                            {{ Form::label('payment') }}
                            {{ Form::number('payment', null, ['class' => 'form-control' . ($errors->has('payment') ? ' is-invalid' : ''), 'placeholder' => 'Payment','required','min' => '0', 'id' => 'rent-request-payment']) }}
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
