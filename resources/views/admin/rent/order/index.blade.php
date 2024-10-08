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
        <div class="card-body">
            <form action="" method="get">
                @include('admin.rent.order.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Rent Request</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone #</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($rentRequests as $key => $rentRequest)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $rentRequest->name }}</td>
                        <td>{{ $rentRequest->phone_number }}</td>
                        <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toDateString() }}</td>
                        <td>{{ Carbon\Carbon::parse($rentRequest->created_at)->toTimeString() }}</td>
                        <td>
                            @if (!is_null($rentRequest->task))
                                {{ $rentRequest->task->status." By ". $rentRequest->task->employee_service }}
                            @endif
                        </td>
                        <td>{{ $rentRequest->status }}</td>
                        <td class="text-center">@include('admin.rent.order.actions')</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $rentRequests->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@include('admin.rent.order.assign.warehouseboy')
@include('admin.rent.order.assign.drivers')
@include('admin.rent.order.assign.add-payment')
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
