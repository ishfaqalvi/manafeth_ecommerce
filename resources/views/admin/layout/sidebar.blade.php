
<li class="nav-item-header pt-0">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : ''}}" href="{{ route('dashboard') }}">
        <i class="ph-house"></i>
        <span>Dashboard</span>
    </a>
</li>
@can('orders-list')
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/orders*') ? 'active' : ''}}" href="{{ route('orders.index') }}">
        <i class="ph-shopping-cart"></i>
        <span>Orders</span>
    </a>
</li>
@endcan
@can('rentRequests-list')
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/rent/request*') ? 'active' : ''}}" href="{{ route('rent.index') }}">
        <i class="ph-buildings"></i>
        <span>Rent Requests</span>
    </a>
</li>
@endcan
@can('maintenenceRequests-list')
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/maintenance/request*') ? 'active' : ''}}" href="{{ route('maintenance.index') }}">
        <i class="ph-lifebuoy"></i>
        <span>Maintenence Requests</span>
    </a>
</li>
@endcan
@can('customers-list')
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/customers*') ? 'active' : ''}}" href="{{ route('customers.index') }}">
        <i class="ph-users-three"></i>
        <span>Customers</span>
    </a>
</li>
@endcan
@canany(['saleProducts-list','rentProducts-list','maintenanceProducts-list'])
<li class="nav-item nav-item-submenu {{ request()->is('admin/products*') ? 'nav-item-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="ph-article"></i>
        <span>Products</span>
    </a>
    <ul class="nav-group-sub collapse {{ request()->is('admin/products*') ? 'show' : ''}}">
        @can('saleProducts-list')
            <li class="nav-item">
                <a
                    href ="{{ route('products.sale.index') }}"
                    class="nav-link {{ request()->routeIs('products.sale*') ? 'active' : ''}}">
                    Sale
                </a>
            </li>
        @endcan
        @can('rentProducts-list')
            <li class="nav-item">
                <a
                    href="{{ route('products.rent.index') }}"
                    class="nav-link {{ request()->routeIs('products.rent*') ? 'active' : ''}}">
                    Rent
                </a>
            </li>
        @endcan
        @can('maintenanceProducts-list')
            <li class="nav-item">
                <a
                    href="{{ route('products.maintenance.index') }}"
                    class="nav-link {{ request()->routeIs('products.maintenance*') ? 'active' : ''}}">
                    Maintenance
                </a>
            </li>
        @endcan
    </ul>
</li>
@endcanany
@can('products-list')
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/products*') ? 'active' : ''}}" href="{{ route('products.index') }}">
        <i class="ph-article"></i>
        <span>Products</span>
    </a>
</li>
@endcan
@can('banners-list')
<li class="nav-item">
    <a href="{{ route('banners.index') }}" class="nav-link {{ request()->is('admin/banners*') ? 'active' : ''}}">
        <i class="ph-article"></i>
        <span>Banners</span>
    </a>
</li>
@endcan
@can('brands-list')
<li class="nav-item">
    <a href="{{ route('brands.index') }}" class="nav-link {{ request()->is('admin/brands*') ? 'active' : ''}}">
        <i class="ph-article"></i>
        <span>Brands</span>
    </a>
</li>
@endcan
@can('blogs-list')
<li class="nav-item">
    <a href="{{ route('blogs.index') }}" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : ''}}">
        <i class="ph-article"></i>
        <span>Blogs</span>
    </a>
</li>
@endcan
@can('topSearches-list')
<li class="nav-item">
    <a href="{{ route('top-searches.index') }}" class="nav-link {{ request()->is('admin/top-searches*') ? 'active' : ''}}">
        <i class="ph-file-search"></i>
        <span>Top Searches</span>
    </a>
</li>
@endcan
@canany(['categories-list','categories-subList'])
<li class="nav-item-header">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Categories</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
@endcanany
@can('categories-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('categories.all*') ? 'active' : ''}}" href="{{ route('categories.all.index') }}">
        <i class="ph-article"></i>
        <span>Main</span>
    </a>
</li>
@endcan
@can('categories-subList')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('categories.sub*') ? 'active' : ''}}" href="{{ route('categories.sub.index') }}">
        <i class="ph-article"></i>
        <span>Sub</span>
    </a>
</li>
@endcan
@canany(['roles-list', 'users-list'])
<li class="nav-item-header">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Access Management</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
@endcanany
@can('roles-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('roles*') ? 'active' : ''}}" href="{{ route('roles.index') }}">
        <i class="ph-atom"></i>
        <span>Roles</span>
    </a>
</li>
@endcan
@can('users-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('users*') ? 'active' : ''}}" href="{{ route('users.index') }}">
        <i class="ph-users"></i>
        <span>Users</span>
    </a>
</li>
@endcan
@canany(['notifications-list','audits-list', 'logs-list'])
<li class="nav-item-header">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Configuration</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
@endcanany
@can('audits-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('notifications*') ? 'active' : ''}}" href="{{ route('notifications.index') }}">
        <i class="ph-bell"></i>
        <span>Notifications</span>
    </a>
</li>
@endcan
@can('audits-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('audits*') ? 'active' : ''}}" href="{{ route('audits.index') }}">
        <i class="ph-diamonds-four"></i>
        <span>Audit</span>
    </a>
</li>
@endcan
@can('logs-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('logs*') ? 'active' : ''}}" href="{{ route('logs') }}" target="_blank">
        <i class="ph-bug"></i>
        <span>Errors</span>
    </a>
</li>
@endcan
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('settings*') ? 'active' : ''}}" href="{{ route('settings.index') }}">
        <i class="ph-gear"></i>
        <span>Settings</span>
    </a>
</li>
