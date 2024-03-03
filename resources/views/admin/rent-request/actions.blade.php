@canany(['rent-requests-view', 'rent-requests-edit', 'rent-requests-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('rent-requests.destroy',$rentRequest->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('rent-requests-view')
                    <a href="{{ route('rent-requests.show',$rentRequest->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('rent-requests-edit')
                    <a href="{{ route('rent-requests.edit',$rentRequest->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('rent-requests-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany