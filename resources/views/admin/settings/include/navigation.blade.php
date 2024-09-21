<div class="d-flex">
    <a
        href="{{ route('settings.general')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.general') ? 'active' : ''}}">
        <i class="ph-note-pencil me-1"></i>
        General
    </a>
    <a
        href="{{ route('settings.website')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.website') ? 'active' : ''}}">
        <i class="ph-globe me-1"></i>
        Website
    </a>
    <a
        href="{{ route('settings.twilio')}}"
        class="d-flex align-items-center text-body p-2 {{ request()->routeIs('settings.twilio') ? 'active' : ''}}">
        <i class="ph-messenger-logo me-1"></i>
        Twilio
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
