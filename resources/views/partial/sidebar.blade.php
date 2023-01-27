<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{ ('AdminLte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ICS - Notes</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar-custom">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="image">
                <img src="{{ ('AdminLte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-1" alt="User Image">
            </div>
            <div class="info">
                <a class="d-flex">{{ auth()->user()->name }}</a>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/detail_note" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Notes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/contacts" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                {{-- Next Project --}}
                {{-- <li class="nav-item">
                    <a href="../calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-block btn-secondary btn-sm pos-right">Logout</button>
        </form>
        <!-- /.sidebar-custom -->
    </div>
    <!-- /.sidebar -->

</aside>