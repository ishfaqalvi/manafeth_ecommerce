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
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="Processing">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Processing') }}
                        </a>
                    </form>
                @endif
                @if($order->status == 'Processing')
                    <a href="#" class="dropdown-item changeStatus" data-id="{{ $order->id }}">
                        <i class="ph-note-pencil me-2"></i>{{ __('Assign') }}
                    </a>
                @endif
                @if($order->status == 'Delivered')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="Completed">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Completed') }}
                        </a>
                    </form>
                @endif
                @if($order->status != 'Cancelled' && $order->status != 'Delivered' && $order->status != 'Completed')
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="Cancelled">
                        <a href="#" class="dropdown-item sa-update">
                            <i class="ph-note-pencil me-2"></i>{{ __('Cancel') }}
                        </a>
                    </form>
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
