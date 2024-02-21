@php
    $current_route = request()->route()->getName();
@endphp

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Top navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer" data-widget="control-sidebar"
                        data-slide="true" role="button">See All Notifications</a>
                </div>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu show">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('dist/img/LGU Quezon LOGO.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        @livewire('admin.logout')
                    </div>
                </li>
            </ul>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link" style="display: flex; align-items: center;">
            <img src="{{ asset('dist/img/LGU Quezon LOGO.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8; margin-right: 5px;">
            <span class="brand-text font-weight-light" style="font-size: 12px; text-align: center;">
                LGU QUEZON DOCUMENT TRACKING <br> & <br> MANAGEMENT SYSTEM
            </span>
        </a>

        <div class="sidebar ">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
                <div class="info">
                    <a>Login As: {{ Auth::guard('admin')->user()->username }}</a> <br>
                    <a>{{ date('F j, Y, g:i a') }}</a>
                </div>
            </div>
        </div>
        <!-- Plus button for adding docs-->
        <div class="sidebar d-flex justify-content-center">
            <div class="mt-1 mb-3">
                <div class="info">
                    <a href="{{ route('add') }}" class="btn btn-block btn-secondary btn-lg d-block ">
                        <i class="fas fa-plus mr-1"></i>
                        <span class="d-none d-md-inline">Documents</span> <!-- Hide on small screens -->
                    </a>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar mt-1 pb-3 mb-3 ">
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-dashboard') }}"
                            class="nav-link
                    {{ $current_route == 'admin.admin-dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Documents
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.documents') }}" class="nav-link {{ $current_route == 'admin.documents' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Executive Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Administrative Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Memorandum Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Office Memorandum</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Office Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Resolutions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ordinances</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Other Documents</p>
                                </a>
                            </li>
                            <!-- Add other list items here -->
                        </ul>
                    </li>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const treeView = document.querySelector('.nav-treeview');
                            const currentRoute = "{{ $current_route }}"; // Assuming $current_route is available from backend

                            if (treeView && currentRoute === '/admin/documents') {
                                treeView.style.display = 'block';
                            } else {
                                treeView.style.display = 'none';
                            }
                        });
                    </script>


                    <!--Next Line of The Navbar-->
                    {{-- <li class="nav-item">
                        <a href="{{ route('department') }}"
                            class="nav-link
                    {{ $current_route == 'department' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Offices
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('TrackingLog') }}"
                            class="nav-link
                    {{ $current_route == 'TrackingLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>
                                Tracking Log
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('AccessLog') }}"class="nav-link
                        {{ $current_route == 'AccessLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-unlock-alt"></i>
                            <p>
                                Access Log
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('userManagement') }}"
                            class="nav-link
                        {{ $current_route == 'userManagement' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Sidebar content -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image: url('background image.png');">
        <div class="content">
            <div class="container-fluid">
                <main>
                    {{ $slot }}
                </main>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Notifications</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Version 1.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2024 <a href="#">LGU QUEZON</a>.</strong> All rights
        reserved.
    </footer>

</div>
</div>
<!-- ./wrapper -->
