@canany(['products-resourceEdit', 'products-resourceDelete'])
<div class="d-inline-flex">
    <form action="{{ route('products.resource.destroy',$row->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('products-resourceDelete')
            <button type="button" class="btn btn-link text-primary editResourceRecord"
                data-id="{{ $row->id }}"
                data-name="{{ $row->name }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('products-resourceDelete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany