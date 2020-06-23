@extends('includes.layout')

@section('title')
    {{ trim( implode(',', $categories->top->pluck('name')->toArray()).','.implode(',', $categories->more->pluck('name')->toArray() ) ) }}
@endsection

@section('description')
    {{ trim('The best sports news website in kenya and africa') }}
@endsection

@section('keywords')
    {{ trim( implode(',', $categories->top->pluck('name')->toArray()).','.implode(',', $categories->more->pluck('name')->toArray() ) ) }}
@endsection

@section('author')
    {{ trim('Standard Group PLC') }}
@endsection

@section('content')
    <section id="standard" class="standard-area pt-100 mt-md-2 mt-lg-3 homept home first">
        <div class="container mx-auto mt-4 mt-lg-0 mt-md-5">

            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5">
                    @include('includes.alert')
                </div>

                <div class="offset-md-2 col-md-8 mb-3">
                    <div style="width:100%;  padding: 0px;">
                        <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group section justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="row">

                        @foreach($stories->top as $article)
                        <div class="col-lg-7 col-md-7 mb-4 mb-md-0">
                            <div class="single-standard mainimg">
                                <h3 class="heading ">
                                    <a href="{{ url( Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" class="pt-0 px-0 titles">
                                        {{ $article->title }} </a>
                                </h3>
                                @if($article->thumbURL != null)
                                <div class="standard-image">
                                    <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}">

                                        <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                             class="" alt="{{ $article->title }}"></a>
                                </div>
                                @endif
                                <div class="standard-content">
                                    <div class="content">
                                        <h4 class="card-text title mt-2">
                                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}"> {{ $article->summary }} </a>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-lg-5 col-md-5 col-sm-12">

                            @foreach($stories->top_side1 as $article)
                            <div class="card minicard">
                                <h4 class="title pb-2">
                                    <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" class="text-color"><font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>{{ $article->title }}</a>
                                </h4>
                                <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                                <div class="row no-gutters">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="single-standard ">
                                            <div class="standard-image">
                                                <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                                     class="card-img-top" alt="{{ $article->title }}">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                </a>
                            </div>
                            @endforeach
                            @foreach($stories->top_side2 as $article)
                            <div class="card minicard">
                                <h4 class="title mt-5 pb-2">
                                    <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" class="text-color"><font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>{{ $article->title }}</a>
                                </h4>
                                <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                                <div class="row no-gutters">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="single-standard ">
                                            <div class="standard-image">
                                                <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                                     class="card-img-top" alt="{{ $article->title }}">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-4 halves">
                        @foreach($stories->top_bottom as $article)
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                        <div class="col-md-4 mb-4 col-sm-12">
                            <div class="card national">
                                <div class="single-standard">
                                    <div class="standard-image">
                                        <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                             class="card-img-top" alt="{{ $article->title }}">
                                    </div>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <h4 class="black py-0">
                                        <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}"class="text-color"><font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>{{ $article->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                            </a>
                        @endforeach

                    </div>
                </div>
                <!---- advert 2 ---->
                <div class="col-12 col-md-4 mb-md-4">
                    <div class="text-center mb-2">
                        <div id='div-gpt-ad-1485837036191-0' style='width:100%;margin:auto;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837036191-0'); });
                            </script>
                        </div>
                    </div>
                    @include('includes.mostread')

                </div>
                <hr class="my-4">
            </div>
        </div>
    </section>

    <div class="container">
        <div class="section group">
            <div class=" span_3_of_5 col">

                <h4 class="section-heading my-2">LOCAL STORIES</h4>

                <div class="row greenimages">
                    <div class="col-md-6 mb-3">
                        @foreach($stories->checkpoint1 as $article)
                        <div class="card">
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                            <div class="media my-2 ">
                                <div class="single-standard">
                                    <div class="standard-image mr-3">
                                        <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                             class="card-img-top" alt="{{ $article->title }}">
                                    </div>
                                </div>
                                <div class="media-body ml-3 ml-md-0">
                                    <h6 class="greentext mb-1">{{$articles->getCategory($article->categoryid)->name}}</h6>
                                    {{ $articles->shorten($articles->getCategory($article->categoryid)->name,$article->title, 50)}}
                                </div>

                            </div>
                            </a>
                        </div>
                        <hr class="my-2">
                        @endforeach
                    </div>
                    <div class="col-md-6 mb-3">
                        @foreach($stories->checkpoint2 as $article)
                            <div class="card">
                                <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                                <div class="media my-2 ">
                                    <div class="single-standard">
                                        <div class="standard-image mr-3">
                                            <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                                 class="card-img-top" alt="{{ $article->title }}">
                                        </div>
                                    </div>
                                    <div class="media-body ml-3 ml-md-0">
                                        <h6 class="greentext mb-1">{{$articles->getCategory($article->categoryid)->name}}</h6>
                                        {{ $articles->shorten($articles->getCategory($article->categoryid)->name,$article->title, 45)}}
                                    </div>
                                </div>
                                </a>
                            </div>
                            <hr class="my-2">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class=" span_2_of_5 col">
                <h4 class="section-heading my-2">GAMEYETU VIDEOS</h4>

                <div class="card videos">
                    @foreach($stories->videos->slice(0,1)->all() as $video)
                        <a href="{{ url('/video/'.$video->id.'/'.Str::slug($video->title)) }}">
                        <div class="single-standard">

                            <div class="black-two">
                                {{ $video->title }}
                            </div>
                            <i class="fa fa-play vida"></i>
                            <img src="https://i.ytimg.com/vi/{{$video->videoURL}}/hqdefault.jpg"
                                 class="vidimg" alt="{{ $video->title }}">
                            <div class="byline mt-2">{{ $videos->getVideoPoster($video->createdBy)->firstname.' '.$videos->getVideoPoster($video->createdBy)->lastname }}</div>
                        </div>
                        </a>
                    @endforeach
                    <div class="card-body p-0 dbl">
                        @foreach($stories->videos->slice(1,3)->all() as $video)
                        <a href="{{ url('/video/'.$video->id.'/'.Str::slug($video->title)) }}">
                        <div class="media my-2 mt-3">
                            <div class="single-standard">
                                <i class="fa fa-play vidasmall"></i>
                                <img src="https://i.ytimg.com/vi/{{$video->videoURL}}/hqdefault.jpg"
                                     class="mr-md-3" alt="{{ $video->title }}">

                            </div>
                            <div class="media-body ml-3 ml-md-0 black">
                                    {{ $video->title }}
                                <div class="byline mt-2">{{ $videos->getVideoPoster($video->createdBy)->firstname.' '.$videos->getVideoPoster($video->createdBy)->lastname }}</div>
                            </div>
                        </div>
                        </a>
                        <hr class="my-2">
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">
    </div>

    <section class="my-4 mx-0">
      <div class="container">
           <div class="ad">
               <div class="row py-5">
                  <div class="offset-md-2 col-md-8">
                      <div id='div-gpt-ad-1487330276546-0' style='width:100%;margin:auto;'>
                          <script>
                              googletag.cmd.push(function() { googletag.display('div-gpt-ad-1487330276546-0'); });
                          </script>
                      </div>
                    </div>
               </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-2 my-1">
            <h4 class="section-heading my-2 mx-0">GALLERY</h4>
            <div class="owl-carousel slideShow py-1">

                @foreach($stories->slideshows as $slideshow)
                <div class="card rounded-0 border-0 ">
                    <div class="single-standard">
                        <a href="{{ url('/slideshow/pictures/'.$slideshow->id.'/'.Str::slug($slideshow->title,'-')) }}">
                            <div style="height:245px; overflow:hidden;">
                                <img src="https://cdn.standardmedia.co.ke{{ $slideshow->imgURL}}"
                                     data-src="https://cdn.standardmedia.co.ke{{ $slideshow->imgURL}}"
                                     alt="{{ $slideshow->title }}"
                                     class="w-100 objectfit lazy">
                            </div>
                        </a>
                    </div>
                    <div class="card-body p-3 bg-white" style="height:120px; overflow:hidden;">
                        <h4 class="black">
                            <a style="color: #000;" href="#">{{ $slideshow->title }} </a>
                        </h4>
                        <small class="text-muted mt-2">
                            <span class="text-danger fa fa-calender"></span>{{ date_create($slideshow->publishdate)->format('d-F-Y') }}
                        </small>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="whitecards">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">WOMEN IN SPORTS</h4>
                    <div class="card-deck p-0">
                        @foreach($stories->volley as $article)

                        <div class="card mb-4">
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}">
                            <div class="single-standard">
                                <div class="standard-image">
                                    <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                         class="card-img-top" alt="{{ $article->title }}">
                                </div>
                            </div>
                            <div class="card-body p-3 bg-white">
                                <p class="card-text black mt-2"><font class="green"> {{$articles->getCategory($article->categoryid)->name}}:</font>
                                    {{ $article->title }}
                                </p>
                                <p class="card-text grey">
                                    {{ $article->summary }}
                                </p>
                            </div>
                            </a>
                        </div>

                        @endforeach

                    </div>
                    <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">UNIQUE SPORTS</h4>
                    <div class="card-deck p-0">
                        @foreach($stories->unique as $article)

                        <div class="card mb-4">
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}">
                            <div class="single-standard">
                                <div class="standard-image">
                                    <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                         class="card-img-top" alt="{{ $article->title }}">
                                </div>

                            </div>
                            <div class="card-body p-3 bg-white">
                                <p class="card-text black"><font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>
                                    {{ $article->title }}
                                </p>
                                <p class="card-text grey"> {{ $article->summary }}</p>
                            </div>
                            </a>
                        </div>

                        @endforeach

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="span_1_of_2_diff col">
                        <div class="text-center">
                            <div id='div-gpt-ad-1485837098208-0' style='width:100%;margin:auto;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837098208-0'); });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="span_1_of_2_diff col">
                        <h4 class="section-heading mx-0 my-2">TWITTER FEEDS</h4>
                        <div class="card check">
                            <a class="twitter-timeline" data-width="400" data-height="500"
                               href="https://twitter.com/GameYetu?ref_src=twsrc%5Etfw">Tweets by GameYetu</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>

                </div>

                <hr class="my-4">
            </div>
        </div>
    </section>
    <section class="opinions">
        <div class="container">
            <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">OPINIONS</h4>
            <div class="section group">

                @foreach($stories->opinion as $article)

                <div class="span_1_of_4 col">
                    <div class="single-standard">
                        <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}">
                        <div class="standard-image">
                            <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                 class="card-img-top" alt="{{ $article->title }}">
                        </div>
                        </a>
                    </div>
                    <div class="card-body p-3 bg-white">
                        <h4 class="black py-2">
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }} "class="text-color">
                                <font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>
                                {{ $article->title }}
                            </a>
                        </h4>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection

@section('js')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                700: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection


