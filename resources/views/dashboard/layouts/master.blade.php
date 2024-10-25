<!DOCTYPE html>
<html lang="en">
@include ('dashboard.partials.head')
<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        @include('dashboard.partials.header')
        @include('dashboard.partials.sidebar')

        <div id="layoutSidenav_content">
            @yield('content')

        </div>
        @include('dashboard.partials.footer')
    </div>
</body>
</html>