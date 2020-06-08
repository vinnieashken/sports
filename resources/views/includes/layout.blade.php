<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAME YETU @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no' >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
@yield('metas')
@include('includes.css')
<!-- google adsense unit-->
</head>
<body class="">
<noscript>
    <h3>JavaScript is disabled! Please enable JavaScript in your web browser!</h3>

</noscript>

@include('includes.header')
<!-- Main content -->
    @yield('content')

    @include('includes.footer')

@include('includes.js')
@yield('js')
@yield('test')
</body>
</html>
