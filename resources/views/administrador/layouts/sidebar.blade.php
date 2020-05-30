<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/img/logo.png" alt="Laravel Starter" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Invita ME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL::asset(Auth::User()->img)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::User()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if(Auth::User()->hasRole('administrador'))
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">ADMINISTRADOR</li>

                    <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                            <!-- Usuarios -->
                            <li class="nav-item">
                                <a href="{{ route('administrador.usuarios') }}" class="nav-link {{Route::currentRouteName() == "administrador.usuarios" ? "active" : ""}}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                            @if(0)
                                <!-- Open -->
                                <li class="nav-item">
                                    <a href="pages/calendar.html" class="nav-link">
                                        <i class="nav-icon fa fa-calendar"></i>
                                        <p>Calendario<span class="badge badge-info right">5</span>
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                </ul>
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
