@canany(['orders-view', 'orders-edit', 'orders-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('orders-view')
                    <a href="{{ route('orders.show',$order->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @if(auth()->user()->can('orders-edit') && in_array($order->status, ['Pending','Processing', 'Confirmed','On the way']))
                    <a href="#" class="dropdown-item changeStatus" data-id="{{ $order->id }}" data-status={{ $order->status }}>
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('orders-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
