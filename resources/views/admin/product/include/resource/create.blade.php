<div id="addResource" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.resource.store') }}" class="validateCreatResource" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create Product Resource') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('product_id', $product->id) }}
                        <div class="form-group mb-3">
                            {{ Form::label('type') }}
                            {{ Form::select('type', ['Basic Operation Documents' => 'Basic Operation Documents','Brochures'=>'Brochures', 'Spec Sheets'=>'Spec Sheets','Order Forms'=>'Order Forms','Owner Manuals'=>'Owner Manuals','Warranty Inserts'=>'Warranty Inserts','Quantum Videos'=>'Quantum Videos','IBPs(UK)'=>'IBPs(UK)'], null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            {{ Form::label('file') }}
                            {{ Form::file('file', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'id' => 'fileUpload','accept'=>'.pdf' ,'required']) }}
                        </div>
                        <div class="form-group col-lg-12 mb-3" id="fileNames"></div>
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