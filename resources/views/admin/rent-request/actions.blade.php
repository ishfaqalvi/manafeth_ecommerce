@canany(['rentRequests-view', 'rentRequests-edit', 'rentRequests-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @can('rentRequests-view')
                <a href="{{ route('rent.show',$rentRequest->id) }}" class="dropdown-item">
                    <i class="ph-eye me-2"></i>{{ __('Show') }}
                </a>
            @endcan
            @can('rentRequests-edit')
                @if($rentRequest->status == 'Pending')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                        <input type="hidden" name="status" value="Confirmed">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Confirmed') }}
                        </a>
                    </form>
                @endif
                @if($rentRequest->status == 'Confirmed')
                    <a href="#" class="dropdown-item assignToWarehouseBoy" data-id="{{ $rentRequest->id }}">
                        <i class="ph-note-pencil me-2"></i>{{ __('Assign To Warehouse Boy') }}
                    </a>
                @endif
                @if($rentRequest->status == 'Processing' && !is_null($rentRequest->task) && $rentRequest->task->status == 'Completed')
                    <a href="#" class="dropdown-item assignToDriver" data-id="{{ $rentRequest->id }}">
                        <i class="ph-note-pencil me-2"></i>{{ __('Assign To Driver') }}
                    </a>
                @endif
                @if($rentRequest->status == 'Delivered')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                        <input type="hidden" name="status" value="Completed">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    </form>
                @endif
                @if($rentRequest->status != 'Cancelled' && $rentRequest->status != 'Delivered' && $rentRequest->status != 'Completed')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                        <input type="hidden" name="status" value="Cancelled">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Cancel') }}
                        </a>
                    </form>
                @endif
            @endcan
            @can('rentRequests-delete')
                <form action="{{ route('rent.destroy',$rentRequest->id) }}" method="POST">
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
