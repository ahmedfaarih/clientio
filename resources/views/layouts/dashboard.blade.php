
<!DOCTYPE html>
<html>

<head>
    @yield('layouts.header')
</head>

<body>
<!-- Sidenav -->
@yield('layouts.sidebar')


<!-- Main content -->
<div class="main-content" id="panel">


    <!-- Topnav -->
    @include('layouts.logout')
    <!-- Header -->





    <!-- Header -->


    <!-- Page content -->
    <div class="container ">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <!-- Footer -->
        <footer class="footer pt-0 text-center">
          &copy MN LAWYERS  {{ date('Y')  }}
        </footer>

</div>
<!-- Argon Scripts -->
<!-- Core -->

<!-- Optional JS -->

<!-- Argon JS -->
<script src="{{ asset('js/argon.js') }}"></script>
</body>

</html>
