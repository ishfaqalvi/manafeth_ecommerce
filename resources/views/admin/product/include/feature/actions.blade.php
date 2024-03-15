@canany(['productFeatures-edit', 'productFeatures-delete'])
<div class="d-inline-flex">
    <form action="{{ route('products.feature.destroy',$feature->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('productFeatures-edit')
            <button type="button" class="btn btn-link text-primary editFeatureRecord"
                data-id="{{ $feature->id }}"
                data-description="{{ $feature->description }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('productFeatures-delete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany