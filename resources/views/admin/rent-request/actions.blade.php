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
                <a href="{{ route('rent.edit',$rentRequest->id) }}" class="dropdown-item">
                    <i class="ph-note-pencil me-2"></i>{{ __('Confirmed') }}
                </a>
                    {{-- <form action="{{ route('rent.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                        <input type="hidden" name="status" value="Confirmed">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Confirmed') }}
                        </a>
                    </form> --}}
                @endif
                @if($rentRequest->collection_type == 'Home Delivery')
                    @if($rentRequest->status == 'Confirmed' || ($rentRequest->status == 'Processing' && $rentRequest->task->status == 'Reject'))
                        <a href="#" class="dropdown-item assignToWarehouseBoy" data-id="{{ $rentRequest->id }}" data-status="Processing">
                            <i class="ph-note-pencil me-2"></i>{{ __('Assign To Warehouse Boy') }}
                        </a>
                    @endif
                    @if(
                        ($rentRequest->status == 'Processing' && !is_null($rentRequest->task) && $rentRequest->task->status == 'Completed') ||
                        ($rentRequest->status == 'Processing' && count($rentRequest->tasks->where('status', 'Completed')) > 0 && $rentRequest->task->status == 'Reject')
                    )
                        <a href="#" class="dropdown-item assignToDriver" data-id="{{ $rentRequest->id }}" data-status="Assign To Driver for deliver">
                            <i class="ph-note-pencil me-2"></i>{{ __('Assign To Driver') }}
                        </a>
                    @endif
                    @if($rentRequest->status == 'Delivered' || ($rentRequest->status == 'Returning' && $rentRequest->task->status == 'Reject'))
                        <a href="#" class="dropdown-item assignToDriver" data-id="{{ $rentRequest->id }}" data-status="Assign To Driver for return">
                            <i class="ph-note-pencil me-2"></i>{{ __('Assign To Driver') }}
                        </a>
                    @endif
                    @if($rentRequest->status == 'Returned')
                        <a href="#" class="dropdown-item addPayment" data-id="{{ $rentRequest->id }}">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    @endif
                @else
                    @if($rentRequest->status == 'Confirmed')
                        <a href="#" class="dropdown-item addPayment" data-id="{{ $rentRequest->id }}">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    @endif
                @endif
                @if($rentRequest->status == 'Pending' || $rentRequest->status == 'Confirm')
                    <form action="{{ route('rent.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $rentRequest->id }}">
                        <input type="hidden" name="status" value="Cancelled">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Cancel') }}
                        </a>
                    </form>
                @endif
                <a href="#" class="dropdown-item addPayment" data-id="{{ $rentRequest->id }}" data-payment="{{ $rentRequest->payment }}">
                    <i class="ph-note-pencil me-2"></i>{{ __('Add Payment') }}
                </a>
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
