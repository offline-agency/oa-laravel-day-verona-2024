<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Laravel Day 2024</title>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/3/3d/LaravelLogo.png">
    @vite(['resources/css/main.css','resources/css/component.css'])
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" style="background: black"
      data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('menu')

<!-- Content-->
<div class="app-content content">
    <div class="content-wrapper container-xxl ">
        <div id="oa-content">
            @yield('content')
        </div>
    </div>
</div>

</body>
@vite(['resources/js/app.js'])

@stack('scripts')

</html>
