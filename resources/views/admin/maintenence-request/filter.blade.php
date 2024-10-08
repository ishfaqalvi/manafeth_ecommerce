<div class="row">
    <!-- Customer Input Field -->
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="name" 
               value="{{ request()->input('name', '') }}" 
               placeholder="Search by name and phone number">
    </div>

    <!-- Status Dropdown -->
    <div class="form-group col-md-3 mb-3">
        {{ Form::select('status', 
        [
            'Pending'               => 'Pending',
            'Accepted'              => 'Accepted',
            'Rejected'              => 'Rejected',
            'Assigned'              => 'Assigned',
            'Out for Maintenance'   => 'Out for Maintenance',
            'Ready to go'           => 'Ready to go',
            'Done'                  => 'Done',
            'Closed'                => 'Closed'
        ], request()->input('status', ''), ['class' => 'form-control select', 'placeholder' => '--Select Status--']) }}
    </div>

    <!-- Submit Button -->
    <div class="form-group col-md-3">
        <div class="d-flex">
            <button type="submit" class="btn btn-primary w-100 me-2">
                Submit <i class="ph-paper-plane-tilt ms-2"></i>
            </button>
            <a href="{{ route('maintenance.index') }}" class="btn btn-primary w-100">
                Clear <i class="ph-x-circle ms-2"></i>
            </a>
        </div>
    </div>
</div>

