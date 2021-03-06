<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title') : The standard Sports
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no' >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

@include('includes.metas')
@yield('amp')

@include('includes.css')
<!-- google adsense unit-->
</head>
<body class="">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNB7V35"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

{{--<!-- /24409412/profitButton -->--}}
{{--<div id='div-gpt-ad-1594193265072-0' style='width: 1px; height: 1px;'>--}}
{{--    <script>--}}
{{--        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1594193265072-0'); });--}}
{{--    </script>--}}
{{--</div>--}}

<!-- /24409412/GameYetu_OutOfPage -->
<div id='div-gpt-ad-1594269348673-0'>
    <script>
        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1594269348673-0'); });
    </script>
</div>

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
