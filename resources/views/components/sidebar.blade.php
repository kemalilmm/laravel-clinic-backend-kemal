<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('doctor.index')}}">KLINIK KEMAL</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li> --}}
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('user.index') }}">User's Management</a>
                    </li>
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('doctor.index') }}">Doctor's Management</a>
                    </li>
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('doctor-schedules.index') }}">Doctor's Schedule</a>
                    </li>
                </ul>
            </li>

    </aside>
</div>
