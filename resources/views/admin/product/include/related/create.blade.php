<div id="addProductModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.related.store') }}" class="relatedValidate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Product') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('prent_id', $product->id,['id'=>'parent']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('product') }}
                            {{ Form::select('child_id', [], Null, ['class' => 'form-control select-remote-data' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','id'=>'product']) }}
                            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
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