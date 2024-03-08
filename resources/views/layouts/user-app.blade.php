@php
    $current_route = request()->route()->getName();
@endphp

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Top navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
            </li>
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
                    <div class="mt-4 pb-4 d-flex justify-content-center">
                        <span>No Notification Found</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer" data-widget="control-sidebar"
                        data-slide="true" role="button">See All Notifications</a>
                </div>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item user-menu show">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('dist/img/LGU Quezon LOGO.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @livewire('user.logout')
                    </div>
                </li>
            </ul>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link" style="display: flex; align-items: center;">
            <img src="{{ asset('dist/img/LGU Quezon LOGO.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8; margin-right: 1px;">
            <p class="brand-text font-weight-light" style="font-size: 12px; text-align: center;">
                LGU QUEZON DOCUMENT TRACKING <br>&<br>MANAGEMENT SYSTEM
            </p>
        </a>

        <div
            class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
                <div class="info">
                    <a>Logged In As: {{ Auth::guard('web')->user()->fname }} {{ Auth::guard('web')->user()->lname }}</a> <br>
                    <a id="dateTimeDisplay">{{ date('F j, Y, g:i a') }}</a>
                </div>
            </div>


            <!-- Plus button for adding docs-->
            <div class="d-flex justify-content-center">
                <div class="mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="{{ route('add') }}" class="btn rounded-pill btn-outline-primary btn-lg">
                            <i class="fas fa-plus mr-1"></i>
                            <p class="d-none d-md-inline">Compose</p> <!-- Hide on small screens -->
                        </a>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->

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
                        <a href="{{ route('user.dashboard') }}"
                            class="nav-link {{ $current_route == 'user.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.documents') }}"
                            class="nav-link
                    {{ $current_route == 'user.documents' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Documents</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('TrackingLog') }}"
                            class="nav-link
                    {{ $current_route == 'TrackingLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>
                                Incoming
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('TrackingLog') }}"
                            class="nav-link
                    {{ $current_route == 'TrackingLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>
                                Outgoing
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=""
                            class="nav-link
                    {{ $current_route == 'TrackingLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>
                                Tracking Log
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=""class="nav-link
                        {{ $current_route == 'AccessLog' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-unlock-alt"></i>
                            <p>
                                Access Log
                            </p>
                        </a>
                    </li>
                
                </ul>
            </nav>
        </div>
        <script>
            function updateDateTime() {
                const now = new Date();
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };
                // This will format the date and time similar to PHP's date('F j, Y, g:i a')
                const dateTimeStr = now.toLocaleDateString('en-US', options);
                document.getElementById('dateTimeDisplay').innerText = dateTimeStr;
            }

            // Update the time every second
            setInterval(updateDateTime, 1000);

            // Also update the time immediately when the script loads
            updateDateTime();
        </script>

        <!-- Sidebar content -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright © 2024 <a href="#">LGU Quezon</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Notifications</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <div id="sidebar-overlay"></div>

</div>
<!-- ./wrapper -->
