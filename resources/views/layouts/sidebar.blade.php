<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('organizador.home') }}" class="brand-link">
        <img src="/images/sin-bordes-08.png" height="80">
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL::asset(Auth::User()->img)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('organizador.ajustes') }}" class="d-block">{{ Auth::User()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">ORGANIZADOR</li>
                @if(Auth::User()->valido != NULL)
                    <li class="nav-item">
                        <a href="{{ route('organizador.chicos') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Tus Niñ@s</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Cajas<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('organizador.cajasPreparacion') }}" class="nav-link">
                                    &emsp;<i class="fas fa-circle nav-icon"></i>
                                    <p>Cajas en Preparacion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('organizador.home', 1) }}" class="nav-link">
                                    &emsp;<i class="fas fa-circle nav-icon"></i>
                                    <p>Cajas Para Controlar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('organizador.home', 1) }}" class="nav-link">
                                    &emsp;<i class="fas fa-circle nav-icon"></i>
                                    <p>Cajas Para Repartir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('organizador.home', 1) }}" class="nav-link">
                                    &emsp;<i class="fas fa-circle nav-icon"></i>
                                    <p>Cajas Repartidas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('organizador.home') }}" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>Ayuda</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('organizador.ajustes') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Ajustes</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
