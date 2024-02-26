@canany(['categories-subEdit', 'categories-subDelete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('categories.sub.destroy',$subCategory->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('categories-subEdit')
                    <button type="button" class="dropdown-item editRecord"
                        data-id="{{ $subCategory->id }}"
                        data-category_id="{{ $subCategory->category_id }}"
                        data-name="{{ $subCategory->name }}"
                        data-image="{{ $subCategory->image }}"
                        >
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </button>
                @endcan
                @can('categories-subDelete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany