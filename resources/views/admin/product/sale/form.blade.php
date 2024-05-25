<form method="POST" action="{{ route('products.sale.update', $product->id) }}" class="editValidate" role="form" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <div class="row">
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('brand') }}
            {{ Form::select('brand_id', brands(), $product->brand_id, ['class' => 'form-control select' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('category') }}
            {{ Form::select('category_id', categories('Sale'), $product->category_id, ['class' => 'form-control select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('sub_category') }}
            {{ Form::select('sub_category_id', [], $product->sub_category_id, ['class' => 'form-control select' . ($errors->has('sub_category_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','default' => $product->sub_category_id,'disabled']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('serial_number') }}
            {{ Form::text('serial_number', $product->serial_number, ['class' => 'form-control' . ($errors->has('serial_number') ? ' is-invalid' : ''), 'placeholder' => 'Serial Number']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('engine_number') }}
            {{ Form::text('engine_number', $product->engine_number, ['class' => 'form-control' . ($errors->has('engine_number') ? ' is-invalid' : ''), 'placeholder' => 'Engine Number']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('model') }}
            {{ Form::text('model', $product->model, ['class' => 'form-control' . ($errors->has('model') ? ' is-invalid' : ''), 'placeholder' => 'Model Number']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('quantity') }}
            {{ Form::number('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','min'=>'0','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('price') }}
            {{ Form::number('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('warranty') }}
            {{ Form::select('warranty',
            [
                1 => '1 Month',
                2 => '2 Month',
                3 => '3 Month',
                4 => '4 Month',
                5 => '5 Month',
                6 => '6 Month',
                7 => '7 Month',
                8 => '8 Month',
                9 => '9 Month',
                10 => '10 Month',
                11 => '11 Month',
                12 => '12 Month'
            ], $product->warranty, ['class' => 'form-control form-select' . ($errors->has('warranty') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('maintenance') }}
            {{ Form::select('maintenance',
            [
                1 => '1 Time',
                2 => '2 Time',
                3 => '3 Time',
                4 => '4 Time',
                5 => '5 Time',
                6 => '6 Time',
                7 => '7 Time',
                8 => '8 Time',
                9 => '9 Time',
                10 => '10 Time',
                11 => '11 Time',
                12 => '12 Time',
            ]
            , $product->maintenance, ['class' => 'form-control form-select' . ($errors->has('maintenance') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'min' =>'0']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('discount') }}
            {{ Form::number('discount', $product->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('status') }}
            {{ Form::select('status', ['Publish' => 'Publish', 'Unpublish' => 'Unpublish'], $product->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        </div>
        <div class="form-group col-lg-4 mb-3">
            {{ Form::label('special','Home Top Product') }}
            {{ Form::select('special', ['Yes' => 'Yes', 'No' => 'No'], $product->special, ['class' => 'form-control form-select' . ($errors->has('special') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12 mb-3">
            {{ Form::label('thumbnail') }}
            {{ Form::file('thumbnail', ['class' => 'form-control dropify' . ($errors->has('thumbnail') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg','data-default-file' => $product->thumbnail, isset($product->thumbnail) ? '' : 'required','data-height' => '225']) }}
        </div>
        <div class="form-group col-lg-12 mb-3">
            {{ Form::label('features') }}
            {{ Form::textarea('features', $product->features, ['class' => 'form-control' . ($errors->has('features') ? ' is-invalid' : ''), 'placeholder' => 'Features', 'id'=>'ckeditorFeatures']) }}
        </div>
        <div class="form-group col-lg-12 mb-3">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description', 'id'=>'ckeditorDescription']) }}
        </div>
        <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
            <button type="submit" class="btn btn-primary ms-3">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
        </div>
    </div>
</form>
