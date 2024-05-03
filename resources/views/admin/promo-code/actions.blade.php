@canany(['promoCodes-view', 'promoCodes-edit', 'promoCodes-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('promo-codes.destroy',$promoCode->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('promoCodes-view')
                    <a href="{{ route('promo-codes.show',$promoCode->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('promoCodes-edit')
                    <a href="{{ route('promo-codes.edit',$promoCode->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('promoCodes-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany