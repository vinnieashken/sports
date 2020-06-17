@extends('includes.layout')

@section('title')
    {{ $stories->category->name }}
@endsection

@section('description')
    {{ trim('The best sports news website in kenya and africa') }}
@endsection

@section('keywords')
    {{ trim( implode(',', $categories->top->pluck('name')->toArray() ).','.implode(',', $categories->more->pluck('name')->toArray() ) ) }}
@endsection

@section('author')
    {{ trim('Standard Group PLC') }}
@endsection

<style>
    @media (min-width: 1200px) {
        .diff .vidasmall {
            position: absolute;
            color: #31b114;
            background: #fbfbfbde;
            padding: 1% 2%;
            font-size: 17px;
            margin-top: 19% !important;
        }
    }
</style>

@section('content')
    <section id="standard" class="standard-area pt-100 homept mt-md-2 mt-lg-3 first">
        <div class="container mx-auto mt-4 mt-lg-0 mt-md-5">
            <div class="row my-2">
                <div class="col-md-12 col-sm-12 mt-5">
                    @include('includes.alert')
                </div>
            </div>
            <div class="row">
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
            <div class="section group justify-content-center">
                <div class="col span_2_of_3">
                    @php
                    //$count = 0;
                    $items = $stories->top;
                    @endphp
                    @for($i=0; $i < count($items); $i++)
                    <div class="card-deck categ">


                        <div class="card bg-white mb-4 single-standard">
                            <a href="{{ url('article/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                            <div class="standard-image">
                                <img class="card-img-top" src="https://cdn.standardmedia.co.ke{{ $items[$i]['thumbURL'] }}" alt="Card image cap">
                            </div>
                            <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
                            <div class="card-body pt-4 px-3 pb-3">
                                <h5 class="card-title">
                                    {{ $items[$i]['title']  }}
                                </h5>
                                <p class="card-text">
                                    {{ $items[$i]['summary'] }}
                                </p>
                            </div>
                            <div class="card-footer bg-white">
                                <small class="byline">{{ $items[$i]['author'] }}</small>
                                <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
                            </div>
                            </a>
                        </div>

                        @php
                            $i++;
                        @endphp

                        @if($i < count($items))
                        <div class="card bg-white mb-4 single-standard">
                            <a href="{{ url(Str::slug($articles->getCategory($items[$i]['categoryid'])->name,'-').'/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                            <div class="standard-image">
                                <img class="card-img-top" src="https://cdn.standardmedia.co.ke{{ $items[$i]['thumbURL'] }}" alt="Card image cap">
                            </div>
                            <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
                            <div class="card-body pt-4 px-3 pb-3">
                                <h5 class="card-title">
                                    {{ $items[$i]['title']  }}
                                </h5>
                                <p class="card-text">
                                    {{ $items[$i]['summary'] }}
                                </p>
                            </div>
                            <div class="card-footer bg-white">
                                <small class="byline">{{ $items[$i]['author'] }}</small>
                                <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
                            </div>
                            </a>
                        </div>
                        @endif
                    </div>

                    @endfor
                </div>

                <div class="col span_1_of_3 group text-left">
                    <div class="text-center mb-2">
                        <div id='div-gpt-ad-1485837036191-0' style='width:100%;margin:auto;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837036191-0'); });
                            </script>
                        </div>
                    </div>

                    @include('includes.mostread')

                    <div class="text-center mt-4">
                        <div id='div-gpt-ad-1485837098208-0' style='width:100%;margin:auto;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837098208-0'); });
                            </script>
                        </div>
                    </div>

                    @include('includes.videos_section')

                </div>
            </div>
            <hr class="my-4">
        </div>
    </section>

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

    <section class="standard-area mt-md-2 mt-lg-3 first">
        <div class="container mx-auto mt-4 mt-lg-0 mt-md-5">
            <div class="row my-2">
            </div>
            <div class="section group justify-content-center">
                <div class="col span_2_of_3" id="more">
                    @php
                        //$count = 0;
                        $items = $stories->bottom;
                    @endphp
                    @for($i=0; $i < count($items); $i++)
                        <div class="card-deck categ">

                            <div class="card bg-white mb-4 single-standard">
                                <a href="{{ url(Str::slug($articles->getCategory($items[$i]['categoryid'])->name,'-').'/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                                <div class="standard-image">
                                    <img class="card-img-top" src="https://cdn.standardmedia.co.ke{{ $items[$i]['thumbURL'] }}" alt="Card image cap">
                                </div>
                                <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
                                <div class="card-body pt-4 px-3 pb-3">
                                    <h5 class="card-title">
                                        {{ $items[$i]['title']  }}
                                    </h5>
                                    <p class="card-text">
                                        {{ $items[$i]['summary'] }}
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                    <small class="byline">{{ $items[$i]['author'] }}</small>
                                    <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
                                </div>
                                </a>
                            </div>
                            @php
                                $i++;
                            @endphp

                            @if($i < count($items))
                            <div class="card bg-white mb-4 single-standard">
                                <a href="{{ url(Str::slug($articles->getCategory($items[$i]['categoryid'])->name,'-').'/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                                <div class="standard-image">
                                    <img class="card-img-top" src="https://cdn.standardmedia.co.ke{{ $items[$i]['thumbURL'] }}" alt="Card image cap">
                                </div>
                                <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
                                <div class="card-body pt-4 px-3 pb-3">
                                    <h5 class="card-title">
                                        {{ $items[$i]['title']  }}
                                    </h5>
                                    <p class="card-text">
                                        {{ $items[$i]['summary'] }}
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                    <small class="byline">{{ $items[$i]['author'] }}</small>
                                    <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
                                </div>
                                </a>
                            </div>
                            @endif
                        </div>

                    @endfor
                </div>
                <div class="col span_1_of_3 mb-4 group">
                    <div class="span_1_of_2_diff col">
                        <div class="text-center mb-2">

                            <div id='div-gpt-ad-1485837217066-0' style='width:100%;margin:auto;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837217066-0'); });
                                </script>
                            </div>

                        </div></div>
                    <div class="span_1_of_2_diff col">
                        <h4 class="section-heading  mt-4">TWITTER FEEDS</h4>
                        <div class="card check">
                            <a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/GameYetu?ref_src=twsrc%5Etfw">Tweets by GameYetu</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>

                    @include('includes.social')

                </div>
            </div>
            <div>
                <button id="btn-more">More</button>
                <input type="hidden" name="offset" value="{{ $offset }}" id="offset">
                <input type="hidden" value="{{ $stories->category->id }}" id="category">
            </div>
            <hr class="my-4">
        </div>
    </section>
    <section class="opinions">
        <div class="container">
            <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">OPINIONS</h4>
            <div class="section group">
                @foreach($stories->opinion as $article)

                    <div class="span_1_of_4 col">
                        <div class="single-standard">
                            <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" >
                            <div class="standard-image">
                                <img src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}"
                                     class="card-img-top" alt="{{ $article->title }}">
                            </div>
                            </a>
                        </div>
                        <div class="card-body p-3 bg-white px-3 pb-3">
                            <h4 class="black py-2">
                                <a href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" class="text-color">
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            //alert('')
            $('#btn-more').on('click',function () {

                var offset = $('#offset').val();
                var category = $('#category').val();
                var contextPath = '{{ url('/') }}';
                var url = contextPath + "/category/more/"+category+"/"+offset;
                //alert(offset+" "+url);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        //alert(data);
                        if(!$.trim(data))
                            return;

                        $("#more").append(data);

                        //var doc = jQuery.parseHTML(data);
                        //var item = $(doc).find('#new_offset');
                        var regex = /value="[0-9]+"/i;
                        var regex2 = /[0-9]+/i;
                        var result = ""+ data.match(regex);
                        var new_offset = result.match(regex2);
                        $('#offset').val(new_offset);
                        //alert(new_offset);
                        $('#new_offset').remove();
                    },
                    error:function (jqXHR, exception) {
                        alert(jqXHR.status)
                    }
                });
            });
        });
    </script>
@endsection
