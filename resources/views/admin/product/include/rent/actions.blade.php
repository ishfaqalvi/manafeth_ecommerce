@canany(['productRent-edit', 'productRent-delete'])
<div class="d-inline-flex">
    <form action="{{ route('products.rents.destroy',$row->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('productRent-edit')
            <button type="button" class="btn btn-link text-primary editRentRecord"
                data-id="{{ $row->id }}"
                data-title="{{ $row->title }}"
                data-days="{{ $row->days }}"
                data-amount="{{ $row->amount }}"
                >
                <i class="ph-pen"></i>
            </button>
        @endcan
        @can('productRent-delete')
            <a href="#" class="text-danger sa-confirm mx-2">
                <i class="ph-trash"></i>
            </a>
        @endcan
    </form>
</div>
@endcanany
