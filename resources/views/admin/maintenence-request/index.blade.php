@extends('admin.layout.app')

@section('title')
    Maintenence Request
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Maintenence Request Managment</span>
        </h4>
    </div>
    @can('maintenenceRequests-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('maintenance.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
                @include('admin.maintenence-request.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Maintenence Request</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone #</th>
                        <th>Charges</th>
                        <th>Collected</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($maintenenceRequests as $key => $maintenenceRequest)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $maintenenceRequest->full_name }}</td>
                        <td>{{ $maintenenceRequest->phone_number }}</td>
                        <td>{{ number_format($maintenenceRequest->payment) }}</td>
                        <td>{{ number_format($maintenenceRequest->payments()->sum('amount')) }}</td>
                        <td>{{ Carbon\Carbon::parse($maintenenceRequest->created_at)->toDateString() }}</td>
                        <td>{{ Carbon\Carbon::parse($maintenenceRequest->created_at)->toTimeString() }}</td>
                        <td>
                            @if (!is_null($maintenenceRequest->task))
                                {{ $maintenenceRequest->task->status." By ". $maintenenceRequest->task->employee_service }}
                            @endif
                        </td>
                        <td>{{ $maintenenceRequest->status }}</td>
                        <td class="text-center">@include('admin.maintenence-request.actions')</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $maintenenceRequests->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@include('admin.maintenence-request.accept')
@include('admin.maintenence-request.assign')
@include('admin.maintenence-request.add-payment')
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
        $('.accept').click(function(){
            $('#request-id').val($(this).data('id'));
            $('#acceptmodel').modal('show');
        });
        $('.assignToMaintenenceBoy').click(function(){
            $('#request-assign-id').val($(this).data('id'));
            $('#request-serial-number').val($(this).data('serial'));
            $('#maintenenceboymodel').modal('show');
        });
        $('.addPayment').click(function(){
            $('#maintenence-request-id').val($(this).data('id'));
            $('#addpaymentmodel').modal('show');
        });
    });
</script>
@endsection
