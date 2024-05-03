<div class="d-flex">
    <a
        href="{{ route('settings.general')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.general') ? 'active' : ''}}">
        <i class="ph-note-pencil me-1"></i>
        General
    </a>
    <a
        href="{{ route('settings.whatsapp')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.whatsapp') ? 'active' : ''}}">
        <i class="ph-note-pencil me-1"></i>
        WhatsApp
    </a>
    <a
        href="{{ route('settings.fcm')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.fcm') ? 'active' : ''}}">
        <i class="ph-note-pencil me-1"></i>
        FCM Notification
    </a>
</div>
