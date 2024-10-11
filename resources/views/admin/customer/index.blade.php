@extends('admin.layout.app')

@section('title', 'Customers')

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Customers Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @can('customers-create')
            <a href="{{ route('customers.create') }}"
                class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                @include('admin.customer.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Customers</h5>
        </div>
        <table class="table table-striped text-nowrap table-customers">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Registered</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Orders history</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('customers.show',$customer->id) }}" class="d-block me-3">
                                <img src="{{ $customer->image }}" width="40" height="40" class="rounded-circle" alt="">
                            </a>
                            <div class="flex-fill">
                                <a href="{{ route('customers.show',$customer->id) }}" class="fw-semibold">{{ $customer->name }}</a>
                                <div class="fs-sm text-muted">
                                    {{ $customer->mobile_number }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ date('M d Y', $customer->created_at->timestamp) }}</td>
                    <td><a href="#">{{ $customer->email }}</a></td>
                    <td>
                        @if($customer->status == 'Active')
                            <span class="badge bg-success rounded-pill">
                                Active
                            </span>
                        @elseif($customer->status == 'Disable')
                            <span class="badge bg-warning rounded-pill">
                                Disable
                            </span>
                        @else
                            <span class="badge bg-danger rounded-pill">
                                Block
                            </span>
                        @endif
                    </td>
                    <td>
                        <div>
                            <i class="ph-clock fs-base lh-base align-top text-danger me-1"></i>
                            Pending:
                            <a href="#">0 orders</a>
                        </div>

                        <div>
                            <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                            Processed:
                            <a href="#">0 orders</a>
                        </div>
                    </td>
                    <td class="text-center">@include('admin.customer.actions')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-body">
            {{ $customers->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        $(".select").select2();
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
    });
</script>
@endsection
