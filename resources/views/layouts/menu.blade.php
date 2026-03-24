<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    {{-- {{ route('orders.index') }} --}}
    <a href="#" class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-male"></i>
        <p>Order</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('settings.edit') }}" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-wrench"></i>
        <p>Settings</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('user.edit') }}" class="nav-link {{ request()->routeIs('user.edit') ? 'active' : '' }}">
        <i class="nav-icon fa fa-user-circle"></i>
        <p>Profile</p>
    </a>
</li>
