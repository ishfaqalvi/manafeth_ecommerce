<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            <span class="fw-normal">Product Related Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @can('products-relatedCreate')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Add New
            </a>
            @endcan
        </div>
    </div>
</div>
@include('admin.product.include.related.create')
<div class="table-responsive">
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th colspan="2">Product name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->relatedParents as $key => $related)
            <tr>
                <td class="pe-0" style="width: 45px;">
                    <a href="#">
                        <img src="{{ $related->child->thumbnail }}" height="60" alt="">
                    </a>
                </td>
                <td>
                    <a href="#" class="d-block fw-semibold">
                        {{ Str::limit($related->child->name, 30) }} 
                    </a>
                    <div class="d-inline-flex align-items-center text-muted fs-sm">
                        <span class="bg-secondary rounded-pill p-1 me-1"></span>
                        {{ $related->child->formula }}
                    </div>
                </td>
                <td>
                    <a href="#" class="d-block fw-semibold">
                        {{ $related->child->category->name }}
                    </a>
                    <div class="d-inline-flex align-items-center text-muted fs-sm">
                        <span class="bg-secondary rounded-pill p-1 me-1">
                        </span>
                        {{ $related->child->subCategory->name }}
                    </div>
                </td>
                <td>{{ $related->child->quantity }}</td>
                <td>
                    @foreach($related->child->prices as $price)
                    <div>
                        @if($price->default == 'Yes')
                        <i class="ph-check-circle fs-base lh-base align-top text-success me-1"></i>
                        @else
                        <i class="ph-clock fs-base lh-base align-top text-danger me-1"></i>
                        @endif
                        {{ $price->title }}:
                        <a href="#">&#8360; {{ $price->price }}</a>
                    </div>
                    @endforeach
                </td>
                <td class="text-center">
                    <form action="{{ route('products.related.destroy',$related->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-icon sa-confirm">
                            <span><i class="ph-trash"></i></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>