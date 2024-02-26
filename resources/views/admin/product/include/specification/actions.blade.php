@canany(['products-specificationEdit', 'products-specificationDelete'])
<div class="d-inline-flex">
    <form action="{{ route('products.specification.destroy',$row->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('products-specificationEdit')
            <button type="button" class="btn btn-link text-primary editSpecRecord"
                data-id="{{ $row->id }}"
                data-title="{{ $row->title }}"
                data-value="{{ $row->value }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('products-specificationDelete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany