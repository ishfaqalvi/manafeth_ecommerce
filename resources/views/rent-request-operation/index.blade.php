@extends('admin.layout.app')

@section('title')
    Rent Request Operation
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Rent Request Operation Managment</span>
        </h4>
    </div>
    @can('rent-request-operations-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('rent-request-operations.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Rent Request Operation</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    
										<th>Rent Request Id</th>
										<th>Actor Id</th>
										<th>Actor Type</th>
										<th>Action</th>
										<th>Performed At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentRequestOperations as $key => $rentRequestOperation)
                <tr>
                    <td>{{ ++$key }}</td>
                    
											<td>{{ $rentRequestOperation->rent_request_id }}</td>
											<td>{{ $rentRequestOperation->actor_id }}</td>
											<td>{{ $rentRequestOperation->actor_type }}</td>
											<td>{{ $rentRequestOperation->action }}</td>
											<td>{{ $rentRequestOperation->performed_at }}</td>

                    <td class="text-center">@include('admin.rent-request-operation.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@canany(['rent-request-operations-view', 'rent-request-operations-edit', 'rent-request-operations-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('rent-request-operations.destroy',$rentRequestOperation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('rent-request-operations-view')
                    <a href="{{ route('rent-request-operations.show',$rentRequestOperation->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('rent-request-operations-edit')
                    <a href="{{ route('rent-request-operations.edit',$rentRequestOperation->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('rent-request-operations-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
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
    });
</script>
@endsection