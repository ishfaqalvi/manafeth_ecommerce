<div id="editOrder{{ $order->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('orders.update') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Assign Order') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null,['id' => 'order-id']) }}
                        {{ Form::hidden('status', 'Assign', ['id'=>'order-status']) }}
                        <div class="form-group" id="warehouseBoysDiv">
                            {{ Form::label('warehouseboy','Warehouse Boys') }}
                            {{ Form::select('warehouseboy', warehouseBoys(true), null, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                        </div>
                        <div class="form-group" id="driversDiv">
                            {{ Form::label('drivers','Drivers') }}
                            {{ Form::select('drivers', drivers(true), null, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
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
