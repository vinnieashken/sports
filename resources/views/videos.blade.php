
@extends('includes.layout')

@section('title')
    | home
@endsection

@section('metas')
    <meta name="keywords" content="Man kyura,Toma, dick, harry">
@endsection

@section('content')

    <section id="standard" class="standard-area pt-100 mt-md-2 mt-lg-3 first">
        <div class="container mx-auto mt-4 mt-lg-0 mt-md-5">
            <div class="row my-2">
            </div>
            <!--        <div class="row">-->
            <!--            <div class="ad-728-90 offset-md-2 col-md-8 mb-3 d-none d-md-block d-lg-block">-->
            <!--                <div style=" width:100%;  padding: 0px;">-->

            <!--                    <div id='div-gpt-ad-1486010480522-0' style='height:90px; width:728px;margin:0px auto 0px auto'>-->
            <!--                        <script>-->
            <!--                            googletag.cmd.push(function () {-->
            <!--                                googletag.display('div-gpt-ad-1486010480522-0');-->
            <!--                            });-->
            <!--                        </script>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-sm-12 ">

                    @foreach( array_slice($stories->videos,0,1) as $video )
                    <div class="card bg-white mb-4 single-standard">
                        <div class="standard-image">
                            <i class="fa fa-play bigblack"></i>
                            <img class="card-img-top h345"
                                 src="https://i.ytimg.com/vi/{{ $video['videoURL'] }}/hqdefault.jpg"
                                 alt="Card image cap"></div>
                        <div class="card-body pt-4">
                            <p class="catertitleb">FOOTBALL</p>
                            <h5 class="card-title tit">
                                {{ $video['title'] }}
                            </h5>
                            <p class="card-text">
                                {!!   $video['description'] !!}
                            </p>
                        </div>
                        <div class="card-footer bg-white">
                            <small class="byline">BY KARION WASEE</small>
                            <small class="byline-two float-right"> </small>
                        </div>
                    </div>
                    @endforeach
                        @php
                            //$count = 0;
                            $items = array_slice($stories->videos,1,11);

                        @endphp

                        @for($i=1; $i < count($items); $i++)
                            <div class="card-deck categ">
                                <div class="card bg-white mb-4 single-standard">

                                    <div class="standard-image">
                                        <i class="fa fa-play smallblack"></i>
                                        <img class="card-img-top"
                                             src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                                             alt="Card image cap">
                                    </div>
                                    <p class="catertitle">ARCHERY</p>
                                    <div class="card-body pt-4">
                                        <h5 class="card-title">
                                            {{ $items[$i]['title'] }}
                                        </h5>
                                        <p class="card-text">
                                            {!! $items[$i]['description'] !!}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <small class="byline">BY KARION WASEE</small>
                                        <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                <div class="card bg-white mb-4 single-standard">

                                    <div class="standard-image">
                                        <i class="fa fa-play smallblack"></i>
                                        <img class="card-img-top"
                                             src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                                             alt="Card image cap">
                                    </div>
                                    <p class="catertitle">ARCHERY</p>
                                    <div class="card-body pt-4">
                                        <h5 class="card-title">
                                            {{ $items[$i]['title'] }}
                                        </h5>
                                        <p class="card-text">
                                            {!! $items[$i]['description'] !!}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <small class="byline">BY KARION WASEE</small>
                                        <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                                    </div>
                                </div>
                            </div>
                        @endfor

                </div>


                <div class="col-lg-4 col-md-4 text-left">
                    <div class="text-center">
                        <img src="https://tpc.googlesyndication.com/simgad/68460162182615902" class="mediumad my-4 mt-md-0">
                    </div>

                    @include('includes.mostread')

                    @include('includes.social)

                    <div class="my-4">
                        <div class="text-center">
                            <img src="https://tpc.googlesyndication.com/simgad/68460162182615902"
                                 class="mediumad my-4  mt-5">
                        </div>
                        <h4 class="section-heading mx-0 mt-2">TWITTER FEEDS</h4>
                        <div class="card check">
                            <a class="twitter-timeline" data-height="600"
                               href="https://twitter.com/GameYetu?ref_src=twsrc%5Etfw">Tweets by GameYetu</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
        </div>
    </section>
    <!--<section class="d-none d-md-block d-lg-block my-4 mx-0">-->
    <!--    <div class="container">-->
    <!--        <div class="ad">-->
    <!--            <div class="row py-5">-->
    <!--                <div class="ad-728-90 offset-md-2 col-md-8 ">-->

    <!--                    <div id='div-gpt-ad-1486968612976-0' style='margin: auto; width: 728px; height: 90px;'>-->
    <!--                        <script>-->
    <!--                            googletag.cmd.push(function () {-->
    <!--                                googletag.display('div-gpt-ad-1486968612976-0');-->
    <!--                            });-->
    <!--                        </script>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <section class="opinions">
        <div class="container">
            <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">OPINIONS</h4>
            <div class="section group">
                @foreach($stories->opinion as $article)
                    <div class="span_1_of_4 col">
                        <div class="single-standard">
                            <div class="standard-image">
                                <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                     class="card-img-top" alt="{{ $article->title }}">
                            </div>

                        </div>
                        <div class="card-body p-3 bg-white">
                            <h4 class="black py-2">
                                <a href="{{ url('article/'.$article->id.'/'.Str::slug($article->title,'-')) }} "class="text-color">
                                    <font class="green"> {{$articles->getCategory($article->categoryid)->name}}: </font>
                                    {{ $article->title }}
                                </a>
                            </h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        </div>
    </section>

@endsection

@section('js')

@endsection

