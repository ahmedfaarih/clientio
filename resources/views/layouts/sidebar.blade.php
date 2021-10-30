
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light ">Clientio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/logoWhite.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>


        @if(auth()->user()->type =="ADMIN")
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Quick links</li>
                <li class="nav-item">
                    <a href="{{'/users'}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p class="text ml-1">  Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{'/projects'}}" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <p class="ml-1">Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{'/documentrequest'}}" class="nav-link">
                        <i class="far fa-file-alt"></i>
                        <p class="ml-1">Request for Documents</p>
                    </a>
                </li>
            </ul>
        </nav>

        @else
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-header">Quick links</li>
                        <li class="nav-item">
                            <a href="{{route('clientDetail', with(Auth::user()->id) )}}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p class="text ml-1">  Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('clientUpdate', with(Auth::user()->id) )}}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p class="ml-1">Projects updates</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('clientRequest', with(Auth::user()->id) )}}" class="nav-link">
                                <i class="far fa-file-alt"></i>
                                <p class="ml-1">Document requests</p>
                            </a>
                        </li>
                    </ul>
                </nav>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
