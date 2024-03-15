<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            <span class="fw-normal">Product Features</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            @can('productFeatures-create')
            <a href="#" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill" data-bs-toggle="modal" data-bs-target="#addFeature">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
            @endcan
        </div>
    </div>
</div>
@include('admin.product.include.feature.create')
<table class="table datatable-basic">
    <thead class="thead">
        <tr>
            <th>No</th>
			<th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($product->features as $key => $feature)
        <tr>
            <td>{{ ++$key }}</td>
			<td>{{ $feature->description }}</td>
            <td class="text-center">@include('admin.product.include.feature.actions')</td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('admin.product.include.feature.edit')