<div class="row">
    <!-- Customer Input Field -->
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="search" 
               value="{{ request()->input('search', '') }}" 
               placeholder="Search by name and email and phone number">
    </div>

    <!-- Status Dropdown -->
    <div class="form-group col-md-3 mb-3">
        {{ Form::select('status', 
        [
            'Active'           => 'Active',
            'Disable'         => 'Disable',
            'Block'         => 'Block'
        ], request()->input('status', ''), ['class' => 'form-control select', 'placeholder' => '--Select Status--']) }}
    </div>

    <!-- Submit Button -->
    <div class="form-group col-md-3">
        <div class="d-flex">
            <button type="submit" class="btn btn-primary w-100 me-2">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
            <a href="{{ route('customers.index') }}" class="btn btn-primary w-100">
                Clear <i class="ph-x-circle ms-2"></i>
            </a>
        </div>
    </div>
</div>

