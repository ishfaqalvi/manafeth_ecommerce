<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            <span class="fw-normal">Product Images</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @can('products-imageCreate')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill" data-bs-toggle="modal" data-bs-target="#addImage">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
            @endcan
        </div>
    </div>
</div>
@include('admin.product.include.image.create')
<div class="row">
    @foreach($product->images as $image)
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="card-img-actions">
                    <a href="{{ $image->image }}" data-bs-popup="lightbox">
                        <img src="{{ $image->image }}" class="card-img" width="90" alt="">
                        <span class="card-img-actions-overlay card-img">
                            <i class="ph-plus text-white ph-2x"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="card-body text-center">
                <button type="button" class="btn btn-sm btn-danger">
                    <i class="ph-trash"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>