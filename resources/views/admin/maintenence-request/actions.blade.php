@canany(['maintenence-requests-view', 'maintenence-requests-edit', 'maintenence-requests-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('maintenence-requests.destroy',$maintenenceRequest->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('maintenence-requests-view')
                    <a href="{{ route('maintenence-requests.show',$maintenenceRequest->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('maintenence-requests-edit')
                    <a href="{{ route('maintenence-requests.edit',$maintenenceRequest->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('maintenence-requests-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany