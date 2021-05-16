


<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('users.index')}}>
                            <i class="fas fa-user"></i>
                            <span class="nav-link-text">Manage Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href={{route('projects.index')}}>
                            <i class="fas fa-folder-open"></i>
                            <span class="nav-link-text">Manage Projects</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href={{route('projects.index')}}>
                            <i class="far fa-file-alt"></i>
                            <span class="nav-link-text">Request for documents</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-globe"></i>  Manage Website
                        </a>
                        <div class="dropdown-menu nav-item " aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item nav-item" href="{{route('Bots.index')}}">Bots</a>
                            <a class="dropdown-item nav-item" href="{{route('legalBits.index')}}">legal Bits</a>
                            <a class="dropdown-item nav-item" href="{{route('publications.index')}}">Publications</a>
                        </div>
                    </li>


                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
               {{-- <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentation</span>
                </h6>--}}
                <!-- Navigation -->

            </div>
        </div>
    </div>
</nav>













