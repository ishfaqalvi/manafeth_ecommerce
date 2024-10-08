@canany(['orders-view', 'orders-edit', 'orders-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @can('orders-view')
                <a href="{{ route('orders.show',$order->id) }}" class="dropdown-item">
                    <i class="ph-eye me-2"></i>{{ __('Show') }}
                </a>
            @endcan
            @can('orders-edit')
                @if($order->status == 'Pending')
                    <a href="{{ route('orders.edit',$order->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Confirmed') }}
                    </a>
                @endif
                @if($order->collection_type == 'Home Delivery')
                    @if($order->status == 'Confirmed' || ($order->status == 'Processing' && $order->task->status == 'Reject'))
                        <a href="#" class="dropdown-item assignToWarehouseBoy" data-id="{{ $order->id }}">
                            <i class="ph-note-pencil me-2"></i>{{ __('Assign To Warehouse Boy') }}
                        </a>
                    @endif
                    @if(
                    ($order->status == 'Processing' && !is_null($order->task) && $order->task->status == 'Completed') ||
                    ($order->status == 'Processing' && count($order->tasks->where('status', 'Completed')) > 0 && $order->task->status == 'Reject')
                    )
                        <a href="#" class="dropdown-item assignToDriver" data-id="{{ $order->id }}">
                            <i class="ph-note-pencil me-2"></i>{{ __('Assign To Driver') }}
                        </a>
                    @endif
                    @if($order->status == 'Delivered')
                        <a href="{{ route('orders.complete',$order->id) }}" class="dropdown-item">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    @endif
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="Cancelled">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Cancel') }}
                        </a>
                    </form>
                @else
                    @if($order->status == 'Confirmed')
                        <a href="{{ route('orders.complete',$order->id) }}" class="dropdown-item">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    @endif
                @endif
                @if($order->status != 'Cancelled' && $order->status != 'Pending')
                <a href="#" class="dropdown-item addPayment" data-id="{{ $order->id }}">
                    <i class="ph-note-pencil me-2"></i>{{ __('Add Payment') }}
                </a>
                @endif
            @endcan
            @can('orders-delete')
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
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
