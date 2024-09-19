<div class="row">
    <!-- Customer Input Field -->
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="customer" 
               value="{{ request()->input('customer', '') }}" 
               placeholder="Search by customer">
    </div>

    <!-- Status Dropdown -->
    <div class="form-group col-md-3 mb-3">
        {{ Form::select('status', [
            'Pending'           => 'Pending',
            'Cancelled'         => 'Cancelled',
            'Confirmed'         => 'Confirmed',
            'Processing'        => 'Processing',
            'Ready for Pickup'  => 'Ready for Pickup',
            'Out For Delivery'  => 'Out For Delivery',
            'Delivered'         => 'Delivered',
            'Returning'         => 'Returning',
            'Ready For Return'  => 'Ready For Return',
            'Out For Return'    => 'Out For Return',
            'Returned'          => 'Returned',
            'Collecting'        => 'Collecting',
            'Collected'         => 'Collected',
            'Completed'         => 'Completed'
        ], request()->input('status', ''), ['class' => 'form-control select', 'placeholder' => '--Select Status--']) }}
    </div>

    <!-- Submit Button -->
    <div class="form-group col-md-3">
        <div class="d-flex">
            <button type="submit" class="btn btn-primary w-100 me-2">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
            <a href="{{ route('rent.index') }}" class="btn btn-primary w-100">
                Clear <i class="ph-x-circle ms-2"></i>
            </a>
        </div>
    </div>
</div>

