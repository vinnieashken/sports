

<link rel="shortcut icon" href="https://www.standardmedia.co.ke/assets/images/favicon-32x32.png" type="image/png">

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

{{--<link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">--}}

{{--<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">--}}

{{--<link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">--}}

{{--<link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css')}}">--}}
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--<link rel="stylesheet" href="{{ asset('assets/css/default.css')}}">--}}

<link rel="stylesheet" href="{{ asset('assets/css/style.min.css?'.date('ymdhis'))}}">
{{--<link rel="stylesheet" href="{{ asset('assets/css/responsive.css?'.date('ymdhis'))}}">--}}

{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"--}}
{{--      integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous"/>--}}
<link rel="preload" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" /></noscript>

@yield('initialscripts')

@if(\Illuminate\Support\Facades\Session::has('loginnotify'))
    <script>
        dataLayer = [{
            'eventCategory': 'NTG subscription',
            'eventAction': 'submit',
            'eventLabel': 'success',
            'nonInteraction': 'false'
        }];
    </script>
@endif
<!-- Google Tag Manager -->
<script >(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TNB7V35');</script>
<!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-9511843-1"></script>--}}
{{--<script>--}}
{{--    window.dataLayer = window.dataLayer || [];--}}
{{--    function gtag(){dataLayer.push(arguments);}--}}
{{--    gtag('js', new Date());--}}

{{--    gtag('config', 'UA-9511843-1');--}}
{{--</script>--}}

<script defer src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
</script>
<script type='text/javascript'>
    googletag.cmd.push(function() {
        var leaderboard1 = googletag.sizeMapping().addSize([1050, 200], [728, 90]).addSize([1024, 768], [728, 90]).addSize([980, 690], [728, 90]).addSize([500, 500], [468, 60]).addSize([0, 0], [320, 50]).build();
        var squarebanner = googletag.sizeMapping().addSize([1050, 200], [336, 280]).addSize([1024, 768], [336, 280]).addSize([500, 500], [300, 250]).addSize([320, 700], [300, 250]).addSize([0, 0], [300, 250]).build();

        var gameyetutop = googletag.defineSlot('/24409412/gameyetu_top_advert', [[320, 50], [468, 60], [728, 90]], 'div-gpt-ad-1506941653033-0').defineSizeMapping(leaderboard1).addService(googletag.pubads());
        var gameyetuadvert1 = googletag.defineSlot('/24409412/gameyetu_rightpanel_advert1',[ [300, 250],[336, 280]], 'div-gpt-ad-1485837036191-0').defineSizeMapping(squarebanner).addService(googletag.pubads());
        var gameyetuadvert2 = googletag.defineSlot('/24409412/gameyetu_rightpanel_advert2', [ [300, 250],[336, 280]], 'div-gpt-ad-1485837098208-0').defineSizeMapping(squarebanner).addService(googletag.pubads());
        var gameyetuadvert3 = googletag.defineSlot('/24409412/gameyetu_rightpanel_advert3', [ [300, 250],[336, 280]], 'div-gpt-ad-1485837217066-0').defineSizeMapping(squarebanner).addService(googletag.pubads());
        googletag.defineSlot('/24409412/gameyetu_floating_banner', [[320, 50], [468, 60], [728, 90]], 'div-gpt-ad-1579702544837-0').defineSizeMapping(squarebanner).addService(googletag.pubads());
        var gameyetuleaderboard = googletag.defineSlot('/24409412/gameyetu_home_leaderboard2', [728, 90], 'div-gpt-ad-1487330276546-0').defineSizeMapping(leaderboard1).addService(googletag.pubads());

        //googletag.defineSlot('/24409412/profitButton', [1, 1], 'div-gpt-ad-1594193265072-0').addService(googletag.pubads());
        googletag.defineOutOfPageSlot('/24409412/GameYetu_OutOfPage', 'div-gpt-ad-1594269348673-0').addService(googletag.pubads());
        googletag.defineSlot('/24409412/home_mobile_sticky_ad_320x50', [320, 50], 'div-gpt-ad-1595943588925-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.pubads().collapseEmptyDivs();
        googletag.enableServices();
    });


</script>


