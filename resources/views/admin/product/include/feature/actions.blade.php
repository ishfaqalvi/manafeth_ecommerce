@canany(['products-featureEdit', 'products-featureDelete'])
<div class="d-inline-flex">
    <form action="{{ route('products.feature.destroy',$feature->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('products-featureEdit')
            <button type="button" class="btn btn-link text-primary editFeatureRecord"
                data-id="{{ $feature->id }}"
                data-description="{{ $feature->description }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('products-featureDelete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany