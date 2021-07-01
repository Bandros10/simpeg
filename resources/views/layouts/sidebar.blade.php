<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @role('super admin')
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        MANAJEMEN USER
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link">
                            <i class="fas fa-users-cog nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('users.roles_permission')}}" class="nav-link">
                            <i class="fas fa-user-lock nav-icon"></i>
                            <p>Role Permission</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role('HRD')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        HRD MENU
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#add_karyawan">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Tambah Data Pegawai</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('data_pegawai.index')}}" class="nav-link">
                            <i class="fas fa-id-card nav-icon"></i>
                            <p>Data Pegawai</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role('karyawan')
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        MENU
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('cuti.index')}}" class="nav-link">
                            <i class="fas fa-user-clock nav-icon"></i>
                            <p>Pengajuan Cuti</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
