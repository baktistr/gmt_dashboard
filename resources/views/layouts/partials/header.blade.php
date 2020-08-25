<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ env('APP_URL', '') }}/assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>

    <ul class="c-header-nav d-md-down-none">
        @if(request()->routeIs('home'))
            <li class="c-header-nav-item font-weight-bolder pl-2">Dashboard</li>
        @endif

        @if(request()->routeIs('treg.show'))
            <li class="c-header-nav-item font-weight-bolder pl-2">{{ $treg->name }}</li>
        @endif

        @if(request()->routeIs('treg.area.show'))
            <li class="c-header-nav-item font-weight-bolder pl-2">AREA {{ $area->name }}</li>
        @endif

        @if(request()->routeIs('building.show'))
            <li class="c-header-nav-item font-weight-bolder pl-2">GEDUNG {{ $building->name }}</li>
        @endif
    </ul>

    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="{{ env('APP_URL', '') }}/assets/img/avatars/6.jpg" alt="user@email.com">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a
                    class="dropdown-item"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{ env('APP_URL', '') }}/icons/sprites/free.svg#cil-account-logout"></use>
                    </svg>
                    Logout
                    <form action="/logout" method="POST"> @csrf </form>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>
