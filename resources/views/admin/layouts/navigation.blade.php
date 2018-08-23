<div class="sidebar" data-image="{{ url('assets/img/sidebar-5.jpg') }}">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @yield('active-dashboard')">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="@yield('active-users')">
                <a class="nav-link" href="{{ url('admin/usuarios') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="@yield('active-records')">
                <a class="nav-link" href="{{ url('admin/encriptaciones') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Encriptaciones</p>
                </a>
            </li>
            <li class="@yield('active-logs')">
                <a class="nav-link" href="{{ url('admin/logs') }}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>Logs</p>
                </a>
            </li>

            {{-- <li class="nav-item active active-pro">
                <a class="nav-link active btn-ml" href="#">
                    <i class="nc-icon nc-email-83"></i>
                    <p>Email</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>