@canany(['maintenenceRequests-view', 'maintenenceRequests-edit', 'maintenenceRequests-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @can('maintenenceRequests-view')
                <a href="{{ route('maintenance.show',$maintenenceRequest->id) }}" class="dropdown-item">
                    <i class="ph-eye me-2"></i>{{ __('Show') }}
                </a>
            @endcan
            @can('maintenenceRequests-edit')
                @if ($maintenenceRequest->status == 'Pending')
                    <form action="{{ route('maintenance.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $maintenenceRequest->id }}">
                        <input type="hidden" name="status" value="Accepted">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Accept') }}
                        </a>
                    </form>
                @endif
                @if($maintenenceRequest->status == 'Accepted')
                    <a href="#" class="dropdown-item assignToMaintenenceBoy" data-id="{{ $maintenenceRequest->id }}">
                        <i class="ph-note-pencil me-2"></i>{{ __('Assign') }}
                    </a>
                @endif
                @if($maintenenceRequest->status != 'Rejected' && $maintenenceRequest->status != 'Done' && $maintenenceRequest->status != 'Closed')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $maintenenceRequest->id }}">
                        <input type="hidden" name="status" value="Rejected">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Reject') }}
                        </a>
                    </form>
                @endif
            @endcan
            @can('maintenenceRequests-delete')
                <form action="{{ route('maintenance.destroy',$maintenenceRequest->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                </form>
            @endcan
        </div>
    </div>
</div>
@endcanany
