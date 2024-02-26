@extends('admin.layout.app')

@section('title')
    Product
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Product Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <button class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill me-2 collapsed" data-bs-toggle="collapse" data-bs-target="#filters" aria-expanded="true">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-funnel"></i>
                </span>
                Filter
            </button>
            @can('products-create')
            <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
<div class="col-sm-12">
    <div class="card collapse {{ !is_null($userRequest) ? 'show' : ''}}" id="filters">
        <div class="card-body">
            <form action="{{route('products.filter')}}" method="post">
                @csrf
                @include('admin.product.filter')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Product</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th colspan="2">Product name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td class="pe-0" style="width: 45px;">
                            <a href="#">
                                <img src="{{ $product->thumbnail }}" height="60" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="#" class="d-block fw-semibold">
                                {{ Str::limit($product->name, 30) }} 
                            </a>
                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                {{ $product->brand->name ?? "" }}
                            </div>
                        </td>
                        <td>
                            <a href="#" class="d-block fw-semibold">
                                {{ $product->category->name }}
                            </a>
                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                <span class="bg-secondary rounded-pill p-1 me-1">
                                </span>
                                {{ $product->subCategory->name ?? ''}}
                            </div>
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <div>
                                @if($product->rent == 'Yes')
                                <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                                @else
                                <i class="ph-x-circle fs-base lh-base align-top text-danger me-1"></i>
                                @endif
                                For Rent
                            </div>
                            <div>
                                @if($product->maintenance == 'Yes')
                                <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                                @else
                                <i class="ph-x-circle fs-base lh-base align-top text-danger me-1"></i>
                                @endif
                                For Maintenance
                            </div>
                        </td>
                        <td class="text-center">
                            @include('admin.product.actions')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
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