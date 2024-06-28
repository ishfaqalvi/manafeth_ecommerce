<div id="addToCart" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.rent.addToCart') }}" class="validateAddToCart" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Product Add To Cart') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ Form::hidden('product_id', null, ['id' => 'product-id']) }}
                        <div class="form-group mb-3">
                            {{ Form::label('customer') }}
                            {{ Form::select('customer_id', customers(), null, ['class' => 'form-control select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                        </div>
                        <div class="form-group mb-3">
                            {{ Form::label('product_rent_id','Rents') }}
                            {{ Form::select('product_rent_id', [], null, ['class' => 'form-control select' . ($errors->has('product_rent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required', 'id' => 'product-rents']) }}
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            {{ Form::label('from', 'From Date') }}
                            {{ Form::date('from', null, ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : '') ,'required']) }}
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            {{ Form::label('to', 'To Date') }}
                            {{ Form::date('to', null, ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : '') ,'required']) }}
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            {{ Form::label('quantity') }}
                            {{ Form::number('quantity', 1, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'min' => '1' ,'required']) }}
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
