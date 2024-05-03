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
    @can('promoCodes-create')
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
                    <th>Discount</th>
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
                    <td>
                        @if($promoCode->discount_type == 'Percentage')
                            {{ $promoCode->discount_value .'%' }}
                        @else
                            {{ number_format($promoCode->discount_value) }}
                        @endif
                    </td>
                    <td>{{ date('d M Y', $promoCode->valid_from) }}</td>
                    <td>{{ date('d M Y', $promoCode->valid_until) }}</td>
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