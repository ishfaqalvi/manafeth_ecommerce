@extends('admin.layout.app')

@section('title')
    Rent Request
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Request Managment</span>
        </h4>
    </div>
    @can('rentRequests-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('rent.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
        </div>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Rent Request</h5>
        </div>
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#table" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">
                    Order List
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a href="#chart" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                    Chart Display
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="table" role="tabpanel">
                @include('admin.rent-request.table')
            </div>
            <div class="tab-pane fade" id="chart" role="tabpanel">
                @include('admin.rent-request.chart')
            </div>
        </div>
    </div>
</div>
@include('admin.rent-request.assign.warehouseboy')
@include('admin.rent-request.assign.drivers')
@include('admin.rent-request.assign.add-payment')
@endsection

@section('script')
<script>
    $(function () {
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
        $(".sa-update").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
        $('.assignToWarehouseBoy').click(function(){
            $('#warehouseboy-order-id').val($(this).data('id'));
            $('#warehouseboy-order-status').val($(this).data('status'));
            $('#warehouseboymodel').modal('show');
        });
        $('.assignToDriver').click(function(){
            $('#driver-order-id').val($(this).data('id'));
            $('#driver-order-status').val($(this).data('status'));
            $('#drivermodel').modal('show');
        });
        $('.addPayment').click(function(){
            $('#rent-id').val($(this).data('id'));
            $('#addpaymentmodel').modal('show');
        });
    });
</script>
@endsection
