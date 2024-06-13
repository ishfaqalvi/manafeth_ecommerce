<div class="container-fluid">
    <div class="d-flex d-lg-none me-2">
        <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
            <i class="ph-list"></i>
        </button>
    </div>
    {{-- <img src="{{ asset('assets/images/logo.png')}}" alt="" height="65px"> --}}
    <ul class="nav flex-row justify-content-end">
        <li class="nav-item nav-item-dropdown-lg dropdown">
            <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <i class="ph-bell"></i>
                <span class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">
                    {{count(auth()->user()->unreadNotifications)}}
                </span>
            </a>
            <div class="dropdown-menu wmin-lg-400 p-0">
                <div class="d-flex align-items-center p-3">
                    <h6 class="mb-0">Messages</h6>
                </div>
                <div class="dropdown-menu-scrollable pb-2">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    <a href="{{ route('notifications.show', $notification->id) }}" class="dropdown-item align-items-start text-wrap py-2">
                        <div class="status-indicator-container me-3">
                            <img src="{{ $notification->data['image'] }}" class="w-40px h-40px rounded-pill" alt="">
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <div class="flex-1">
                            <span class="fw-semibold">{{ $notification->data['name'] }}</span>
                            <span class="text-muted float-end fs-sm">{{ $notification->created_at->diffForHumans()}}</span>
                            <div class="text-muted">{{ $notification->data['message'] }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="d-flex border-top py-2 px-3">
                    @if(count(auth()->user()->unreadNotifications) > 0)
                    <a href="{{ route('notifications.readAll') }}" class="text-body">
                        <i class="ph-checks me-1"></i>
                        Dismiss all
                    </a>
                    @else
                        <span>Woohoo! You've read all notification.</span>
                    @endif
                    <a href="{{ route('notifications.index') }}" class="text-body ms-auto">
                        View all
                        <i class="ph-arrow-circle-right ms-1"></i>
                    </a>
                </div>
            </div>
        </li>
    </ul>
    <ul class="nav flex-row justify-content-end order-1 order-lg-2">
        <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
            <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                <div class="status-indicator-container">
                    <img src="{{ Auth::user()->image }}" class="w-32px h-32px rounded-pill" alt="">
                    <span class="status-indicator bg-success"></span>
                </div>
                <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('users.profileEdit') }}" class="dropdown-item">
                    <i class="ph-user-circle me-2"></i>
                    My profile
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <a
                        href="{{ route('admin.logout') }}"
                        class="dropdown-item"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="ph-sign-out me-2"></i>
                        Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</div>
