@extends('admin.layout.app')

@section('title')
    Promo Code
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Promo Code Managment</span>
        </h4>
    </div>
    @can('promo-codes-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('promo-codes.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">Promo Code</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    
										<th>Title</th>
										<th>Code</th>
										<th>Discount Type</th>
										<th>Discount Value</th>
										<th>Valid From</th>
										<th>Valid Until</th>
										<th>Usage Limit</th>
										<th>Status</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($promoCodes as $key => $promoCode)
                <tr>
                    <td>{{ ++$key }}</td>
                    
											<td>{{ $promoCode->title }}</td>
											<td>{{ $promoCode->code }}</td>
											<td>{{ $promoCode->discount_type }}</td>
											<td>{{ $promoCode->discount_value }}</td>
											<td>{{ $promoCode->valid_from }}</td>
											<td>{{ $promoCode->valid_until }}</td>
											<td>{{ $promoCode->usage_limit }}</td>
											<td>{{ $promoCode->status }}</td>

                    <td class="text-center">@include('admin.promo-code.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@canany(['promo-codes-view', 'promo-codes-edit', 'promo-codes-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('promo-codes.destroy',$promoCode->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('promo-codes-view')
                    <a href="{{ route('promo-codes.show',$promoCode->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('promo-codes-edit')
                    <a href="{{ route('promo-codes.edit',$promoCode->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('promo-codes-delete')
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