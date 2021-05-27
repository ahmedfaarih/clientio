
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" ">
                <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clientDetail', with(Auth::user()->id) )}}">
                            <i class="fas fa-folder-open"></i>
                            <span class="nav-link-text">My profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clientUpdate', with(Auth::user()->id) )}}">
                            <i class="fas fa-pen-alt"></i>
                            <span class="nav-link-text">Project Updates</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clientRequest', with(Auth::user()->id) )}}">
                            <i class="fas fa-pen-alt"></i>
                            <span class="nav-link-text">Document Requests</span>
                        </a>
                    </li>


                </ul>

                <hr class="my-3">

            </div>
        </div>
    </div>
</nav>













