<div class="row">
    <div class="fw-bold border-bottom pb-2 mb-3">Order Details</div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $rentLink->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-5 mb-3">
        {{ Form::label('product_id','Products') }}
        {{ Form::select('product_id', $products, $rentLink->product_id, ['class' => 'form-control select' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','id' => 'product-select']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-5 mb-3">
        {{ Form::label('product_rent_id', 'Rent') }}
        {{ Form::select('product_rent_id', [], $rentLink->product_rent_id, ['class' => 'form-control select' . ($errors->has('product_rent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required', 'id' => 'rent-select', 'default' => $rentLink->product_rent_id]) }}
        {!! $errors->first('product_rent_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-2 mb-3">
        {{ Form::label('quantity') }}
        {{ Form::number('quantity', $rentLink->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity','required', 'min' => '1']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('from') }}
        {{ Form::text('from', $rentLink->from ? date('m-d-Y', $rentLink->from) : '', ['class' => 'form-control from_date' . ($errors->has('from') ? ' is-invalid' : ''), 'placeholder' => 'From','required']) }}
        {!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('to') }}
        {{ Form::text('to', $rentLink->to ? date('m-d-Y', $rentLink->to) : '', ['class' => 'form-control to_date' . ($errors->has('to') ? ' is-invalid' : ''), 'placeholder' => 'To','required']) }}
        {!! $errors->first('to', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('price_change_type') }}
        {{ Form::select('price_change_type', ['increment' => 'Increment', 'decrement' => 'Decrement'], $rentLink->price_change_type, ['class' => 'form-control select' . ($errors->has('price_change_type') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'id' => 'price_change_type']) }}
        {!! $errors->first('price_change_type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-3 mb-3">
        {{ Form::label('price_change_value') }}
        {{ Form::number('price_change_value', $rentLink->price_change_value, ['class' => 'form-control' . ($errors->has('price_change_value') ? ' is-invalid' : ''), 'placeholder' => 'Price Change Value']) }}
        {!! $errors->first('price_change_value', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="fw-bold border-bottom pb-2 mb-3">Delivery Details</div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('collection_date') }}
        {{ Form::text('collection_date', $rentLink->collection_date ? date('m-d-Y', $rentLink->collection_date) : '', ['class' => 'form-control collection_date' . ($errors->has('to') ? ' is-invalid' : ''), 'placeholder' => 'Collection Date','required','id' => 'collection_date']) }}
        {!! $errors->first('collection_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('collection_type') }}
        {{ Form::select('collection_type', ['Self Pickup' => 'Self Pickup','Home Delivery' => 'Home Delivery'], $rentLink->collection_type, ['class' => 'form-control select', 'placeholder' => '--Select--','required', 'id' => 'collection_type']) }}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('time_slot_id', 'Time Slot') }}
        {{ Form::select('time_slot_id', [], $rentLink->time_slot_id, ['class' => 'form-control select' . ($errors->has('time_slot_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required', 'id' => 'time_slot_select', 'default' => $rentLink->time_slot_id]) }}
        {!! $errors->first('time_slot_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('address') }}
        {{ Form::text('address', $rentLink->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required', 'id' => 'address']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    {{ Form::hidden('lat', null, ['id' => 'lat']) }}
    {{ Form::hidden('long', null, ['id' => 'long']) }}
	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
