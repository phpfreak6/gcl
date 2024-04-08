<li class="nav-item">
    <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="{{ route('home') }}">
      <i class="nav-icon fas fa-home"></i>
      <p>Dashboard</p>
    </a>
</li>
@can('quotes')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('quotes*') ? 'active' : '' }}" href="{{ route('quotes') }}">
        <i class="nav-icon fas fa-receipt"></i>
            <p>Get Quotes</p>
        </a>
    </li>
@endcan
@can('pickups')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('pickups*') ? 'active' : '' }}" href="{{ route('pickups.index') }}">
        <i class="nav-icon fas fa-shipping-fast"></i>
            <p>Request Pickup</p>
        </a>
    </li>
@endcan
@can('users')
    <li class="nav-item has-treeview {{ Request::is('users*') || Request::is('roles*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('users*') || Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
            Authentication
            <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            @can('users')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Users</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

<li class="nav-item">
    <a href="{!! url('/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" >
      <i class="nav-icon fas fa-sign-out-alt"></i>
      <p>Logout </p>
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
