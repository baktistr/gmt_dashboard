<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <a href="{{ route('home') }}" class="c-sidebar-brand d-lg-down-none bg-white">
        <img class="c-sidebar-brand-full" src="{{ asset('img/telkom-logo.svg') }}" height="55" alt="{{ config('app.name') }}">
        <img class="c-sidebar-brand-minimized" src="{{ asset('img/telkom-logo-minimized.svg') }}" height="40" alt="{{ config('app.name') }}">
    </a>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-title">Telkom Regional</li>
        @foreach($tregList as $treg)
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('treg.show', $treg) }}">
                    <i class="cil-library-building c-sidebar-nav-icon"></i>
                    {{ $treg->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
