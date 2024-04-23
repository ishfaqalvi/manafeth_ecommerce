@canany(['rentSubCategories-view', 'rentSubCategories-edit', 'rentSubCategories-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('sub.rent.destroy',$category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('rentSubCategories-view')
                    <a href="{{ route('sub.rent.show',$category->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('rentSubCategories-edit')
                    <a href="{{ route('sub.rent.edit',$category->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('rentSubCategories-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany