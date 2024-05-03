@canany(['fcmNotifications-view', 'fcmNotifications-edit', 'fcmNotifications-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('fcm-notifications.destroy',$fcmNotification->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('fcmNotifications-view')
                    <a href="{{ route('fcm-notifications.show',$fcmNotification->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('fcmNotifications-edit')
                    <a href="{{ route('fcm-notifications.edit',$fcmNotification->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('fcmNotifications-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
