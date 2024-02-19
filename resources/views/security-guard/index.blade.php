@extends('admin.layout.app')

@section('title')
    Security Guard
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Security Guard Managment</span>
        </h4>
    </div>
    @can('security-guards-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('security-guards.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Security Guard</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    
										<th>First Name</th>
										<th>Last Name</th>
										<th>Preferred Name</th>
										<th>Email</th>
										<th>Licence Number</th>
										<th>Licence Expiry Date</th>
										<th>Home Address</th>
										<th>Postal Address</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($securityGuards as $key => $securityGuard)
                <tr>
                    <td>{{ ++$key }}</td>
                    
											<td>{{ $securityGuard->first_name }}</td>
											<td>{{ $securityGuard->last_name }}</td>
											<td>{{ $securityGuard->preferred_name }}</td>
											<td>{{ $securityGuard->email }}</td>
											<td>{{ $securityGuard->licence_number }}</td>
											<td>{{ $securityGuard->licence_expiry_date }}</td>
											<td>{{ $securityGuard->home_address }}</td>
											<td>{{ $securityGuard->postal_address }}</td>

                    <td class="text-center">@include('admin.security-guard.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@canany(['security-guards-view', 'security-guards-edit', 'security-guards-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('security-guards.destroy',$securityGuard->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('security-guards-view')
                    <a href="{{ route('security-guards.show',$securityGuard->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('security-guards-edit')
                    <a href="{{ route('security-guards.edit',$securityGuard->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('security-guards-delete')
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