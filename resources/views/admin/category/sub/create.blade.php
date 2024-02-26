<div id="addSubCategory" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('categories.sub.store') }}" class="validate" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Sub Category') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-12 mb-3">
                            {{ Form::label('category') }}
                            {{ Form::select('category_id', categories(), null, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            {{ Form::label('name') }}
                            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                        </div>
                        <div class="form-group col-lg-12">
                            {{ Form::label('image') }}
                            {{ Form::file('image', ['class' => 'form-control dropify' . ($errors->has('image') ? ' is-invalid' : ''), 'required','accept' => 'image/png,image/jpg,image/jpeg','data-height' => '250']) }}
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