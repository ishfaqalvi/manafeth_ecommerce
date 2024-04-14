@canany(['topSearches-view', 'topSearches-edit', 'topSearches-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('top-searches.destroy',$topSearch->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('topSearches-view')
                    <a href="{{ route('top-searches.show',$topSearch->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('topSearches-edit')
                    <a href="{{ route('top-searches.edit',$topSearch->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('topSearches-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
