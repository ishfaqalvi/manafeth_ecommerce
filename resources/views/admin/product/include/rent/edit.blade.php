<div id="editRent" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.rents.update') }}" class="validateCreatRent" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Update Product Rent') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('id', null, ['id' => 'editRent-id']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('title') }}
                            {{ Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required', 'id' => 'editRenttitle']) }}
                        </div>
                        <div class="form-group mb-3">
                            {{ Form::label('days') }}
                            {{ Form::number('days', null, ['class' => 'form-control' . ($errors->has('days') ? ' is-invalid' : ''), 'placeholder' => 'Days','required', 'id' => 'editRentdays']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('amount') }}
                            {{ Form::number('amount', null, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount','required', 'id' => 'editRentamount']) }}
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
