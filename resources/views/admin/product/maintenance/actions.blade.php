@canany(['maintenanceProducts-view', 'maintenanceProducts-edit', 'maintenanceProducts-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('products.maintenance.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('maintenanceProducts-view')
                    <a href="{{ route('products.maintenance.show',$product->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('maintenanceProducts-edit')
                    <a href="{{ route('products.maintenance.edit',$product->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('maintenanceProducts-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany