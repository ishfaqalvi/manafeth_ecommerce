<div id="addpaymentmodel" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('rent.addPayment') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Rent Payment Collection') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('orderable_id', null,['id' => 'rent-id']) }}
                        {{ Form::hidden('orderable_type', 'App\Models\RentRequest') }}
                        {{ Form::hidden('collectable_id', auth()->user()->id) }}
                        {{ Form::hidden('collectable_type', 'App\Models\User') }}
                        <div class="form-group mb-3">
                            {{ Form::label('payment_method') }}
                            {{ Form::select('payment_method',['Online Transfer' => 'Online Transfer', 'Cash' => 'Cash'], null, ['class' => 'form-control form-select' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('amount') }}
                            {{ Form::number('amount', null, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount', 'required', 'min' => '0']) }}
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
