@canany(['timeSlots-view', 'timeSlots-edit', 'timeSlots-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('time-slots.destroy',$timeSlot->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('timeSlots-view')
                    <a href="{{ route('time-slots.show',$timeSlot->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('timeSlots-edit')
                    <a href="{{ route('time-slots.edit',$timeSlot->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('timeSlots-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
