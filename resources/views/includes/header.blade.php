
<div id="myOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay ">x</span>
    <div class="overlay-content">
        <form action="{{ url('/search') }}" method="GET">
            <input type="text" placeholder="Search The Standard.." name="q">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<!--search-->
<header class="header-area">

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn border-0" onclick="closeNav()">x</a>
        <a class="navheading">Sports</a>

        @foreach($categories->more as $category)
        <a href="{{ url('category/'.$category->id.'/'.Str::slug($category->name,'-')) }}">{{$category->name}}</a>
        @endforeach
        <a href="{{ url('/videos') }}">videos</a>

        <a class="navheading">TV Stations</a>
        <a href="https://www.standardmedia.co.ke/ktn">KTN Home</a>
        <a href="https://www.standardmedia.co.ke/ktnnews">KTN News</a>
        <a href="http://www.btvkenya.ke/">BTV</a>
        <a href="https://www.farmers.co.ke/videolist">KTN Farmers TV</a>
        <a class="navheading">Radio Stations</a>
        <a href="https://www.standardmedia.co.ke/radiomaisha">Radio Maisha</a>
        <a href="https://www.spicefm.co.ke">Spice FM</a>
        <a href="https://www.vybezradio.co.ke">Vybez Radio</a>
        <a class="navheading">Digital News</a>
        <a href="https://www.standardmedia.co.ke/stories/public/category/7/opinion">Opinions</a>
        <a href="https://newsstand.standardmedia.co.ke/">E-Paper</a>
        <a href="https://www.standardmedia.co.ke/videos/">Videos</a>
        <a class="navheading">Lifestyle & Entertainment</a>
        <a href="https://thenairobian.ke/">Nairobian</a>
        <a href="https://www.standardmedia.co.ke/entertainment">Entertainment</a>
        <a href="https://www.standardmedia.co.ke/evewoman/">Eve Woman</a>
        <a href="https://www.travelog.ke/">Travelog</a>
        <a class="navheading">Enterprise</a>
        <a href="http://vas.standardmedia.co.ke/">VAS</a>
        <a href="https://tutorsoma.standardmedia.co.ke/">E-Learning</a>
        <a href="https://newsstand.standardmedia.co.ke/">E-Paper</a>
        <a class="navheading">The Standard Group</a>
        <a href="https://www.standardmedia.co.ke/corporate">Corporate</a>
    </div>
    <!--sidenav phone ipad & tablet-->
    <div id="mySidenavMob" class="sidenav sidenavMob">

        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item dropdown active">
                <a id="navbarDropdown" class="nav-link dropdown-toggle profile" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-right" href="{{ url('/logout') }}">
                        Logout
                    </a>
                </div>
            </li>
        @else
            <a data-scroll-nav="0" class="nav-link sectionborder" data-toggle="modal"
               data-dismiss="modal" data-target="#loginModal" href="#">Login</a>
        @endif

{{--        <a href="#" class="profile"><i class="fa fa-user-circle-o"></i> Hi Nicodemus</a>--}}

        <a href="javascript:void(0)" class="closebtn border-0" onclick="closeNavMob()">x</a>
        <a class="bg-dark text-white" onclick="openNav()"><i class="fa fa-bars text-white"></i> Sections</a>

        @foreach($categories->top as $category)
            <a href="{{ url('category/'.$category->id.'/'.Str::slug($category->name,'-')) }}">{{$category->name}}</a>
        @endforeach
        @foreach($categories->more as $category)
            <a href="{{ url('category/'.$category->id.'/'.Str::slug($category->name,'-')) }}">{{$category->name}}</a>
        @endforeach
        <a href="{{ url('/videos') }}">videos</a>

        <a href="#" class="bg-danger text-white">
            E-Paper @Ksh.20 </a>
    </div>
    <!--sidenav phone ipad & tablet-->
    <!--added none-->
    <div class="fixed-top bg-white pb-2">
        <ul class="navbar navbar-expand-md none">
            <li class="collapse navbar-collapse flex-column ">
                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    <img src="{{ url('/assets/images/logo.png') }}"
                         alt="Standardmedia logo" id="myImagese">
                </a>
            </li>
        </ul>
        <div class="pos-f-t">
            <nav class="navbar navbar-light bg-light sticky-top px-3 block">

                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    <img src="{{ url('/assets/images/logo.png') }}"
                         alt="Standardmedia logo" class="w140">
                </a>
                <a class="nav-link mr-3 ml-auto d-lg-none d-block" onclick="openSearch()"><i
                        class="fa fa-search mt-2"></i></a>
                <button class="navbar-toggler" type="button" onclick="openNavMob()">
                    <i class="fa fa-bars"></i>
                </button>
            </nav>
        </div>
        <div class="row">
            <!--added none-->
            <div class="col-lg-12 none">
                <nav class="navbar navbar-expand-md navbar-dark bg-white sticky-top mx-md-4 mx-2 py-md-0">

                    <a class="navbar-brand text-center" href="{{ url('/') }}">
                        <img src="{{ url('/assets/images/logo.png') }}"
                             alt="Standardmedia logo" class="w140 d-block d-lg-none d-md-none logo">
                    </a>
                    <div class="navbar-toggler-right d-flex">
                        <a class="nav-link d-md-none d-lg-none d-block" onclick="openSearch()"><i
                                class="fa fa-search mt-1"></i></a>
                        <button class="navbar-toggler" onclick="openNavMob()">
                            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i> </span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse flex-column  sticky-top " id="navbar">
                        <ul class="navbar-nav justify-content-around w-100 px-3">

                            <li class="nav-item ">
                                <a class="nav-link sectionborder" onclick="openNav()"><i
                                        class="mr-2 fa fa-bars"></i>MORE</a>
                            </li>
                            <li class="nav-item  active ">
                                <a class="nav-link d-none d-md-block d-lg-block "
                                   href="{{ url('/') }}"><i class="fa fa-home"></i></a>
                            </li>
                            <li class="nav-item  d-none d-md-block d-lg-block">
                                <a class="nav-link" onclick="openSearch()"><i
                                        class="fa fa-search pointer"></i></a>
                            </li>

                            @foreach($categories->top as $category)
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ url('category/'.$category->id.'/'.Str::slug($category->name,'-')) }}">{{$category->name}}</a>
                            </li>
                            @endforeach

                            <li class="nav-item login">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                <li class="nav-item dropdown active">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                                        {{ Auth::user()->name }}
                                        <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item text-right" href="{{ url('/logout') }}">
                                            Logout
                                        </a>
                                    </div>
                                </li>
                                @else
                                <a data-scroll-nav="0" class="nav-link sectionborder" data-toggle="modal"
                                   data-dismiss="modal" data-target="#loginModal" href="#">Login</a>
                                @endif
                            </li>
                            <li class="nav-item ctabg ">
                                <a class="nav-link" target="_blank" href="https://newsstand.standardmedia.co.ke/"> E-Paper
                                    @Ksh.20 </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div></div>
    </div>
</header>

<script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "url": "{{ url('/') }}",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.standardmedia.co.ke/sports/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
</script>

<script type="application/ld+json">
        {
              "@context": "http://schema.org",
              "@type": "Organization",
              "url": "{{ url('/') }}",
              "logo": "{{url('/assets/images/logo.png')}}"
        }

</script>

<script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Person",
          "name": "Standard Digital - Your Gateway",
          "url": "{{ url('/') }}",
          "sameAs": [
                        "https://www.facebook.com/GameYetu/",
                        "https://www.instagram.com/game_yetu/?hl=en",
                        "https://t.me/gameyetu",
                        "https://twitter.com/gameyetu?lang=en"
                    ]
        }
</script>



