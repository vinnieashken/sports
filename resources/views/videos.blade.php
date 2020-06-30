
@extends('includes.layout')

@section('title')
    Videos
@endsection

@section('description')

@endsection

@section('content')

    <section id="standard" class="standard-area pt-100 mt-md-2 mt-lg-3 first">
        <div class="container mx-auto mt-lg-0 mt-md-5">
            <div class="row my-2">
                <div class="col-md-12 col-sm-12 mt-md-5">
                    @include('includes.alert')
                </div>
            </div>

            <div class="row">
                <div class="offset-md-2 col-md-8 col-sm-12 mb-3">
                    <div style="width:100%;  padding: 0px;" class="mx-auto">
                        <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-sm-12 " id="more">

                    @foreach( array_slice($stories->videos,0,1) as $video )
                    <div class="card bg-white mb-4 single-standard">
                        <a href="{{ url('video/'.$video['id'].'/'.Str::slug($video['title'],'-')) }}">
                        <div class="standard-image">
                            <i class="fa fa-play bigblack"></i>
                            <img class="card-img-top h345 "
                                 src="https://i.ytimg.com/vi/{{ $video['videoURL'] }}/hqdefault.jpg"
                                 alt="{{ $video['title'] }}"></div>
                        <div class="card-body pt-4">
{{--                            <p class="catertitleb">FOOTBALL</p>--}}
                            <h5 class="card-title tit">
                                {{ $video['title'] }}
                            </h5>
                            <p class="card-text">
                                {!!   $video['description'] !!}
                            </p>
                        </div>
                        <div class="card-footer bg-white">
                            @php
                              $poster = $videos->getVideoPoster($video['createdBy']);
                            @endphp
                            <small class="byline">BY {{ $poster->firstname }} {{ $poster->lastname }}</small>
                            <small class="byline-two float-right"> </small>
                        </div>
                        </a>
                    </div>
                    @endforeach
                        @php
                            //$count = 0;
                            $items = array_slice($stories->videos,1,11);

                        @endphp

                        @for($i=1; $i < count($items); $i++)
                            <div class="card-deck categ">
                                <div class="card bg-white mb-4 single-standard">
                                    <a href="{{ url('video/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                                    <div class="standard-image">
                                        <i class="fa fa-play smallblack"></i>
                                        <img class="card-img-top lazy"
                                             src="{{ asset('assets/images/pic.jpg') }}"
                                             data-src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                                             alt="{{ $items[$i]['title'] }}">
                                    </div>
{{--                                    <p class="catertitle">ARCHERY</p>--}}
                                    <div class="card-body pt-4">
                                        <h5 class="card-title">
                                            {{ $items[$i]['title'] }}
                                        </h5>
                                        <p class="card-text">
                                            {!! $items[$i]['description'] !!}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        @php
                                            $poster = $videos->getVideoPoster($video['createdBy']);
                                        @endphp
                                        <small class="byline">BY {{ $poster->firstname }} {{ $poster->lastname }}</small>
                                        <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                                    </div>
                                    </a>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @if($i < count($items))
                                <div class="card bg-white mb-4 single-standard">
                                    <a href="{{ url('video/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                                    <div class="standard-image">
                                        <i class="fa fa-play smallblack"></i>
                                        <img class="card-img-top lazy"
                                             src="{{ asset('assets/images/pic.jpg') }}"
                                             data-src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                                             alt="{{ $items[$i]['title'] }}">
                                    </div>

{{--                                    <p class="catertitle">ARCHERY</p>--}}

                                    <div class="card-body pt-4">
                                        <h5 class="card-title">
                                            {{ $items[$i]['title'] }}
                                        </h5>
                                        <p class="card-text">
                                            {!! $items[$i]['description'] !!}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        @php
                                            $poster = $videos->getVideoPoster($video['createdBy']);
                                        @endphp
                                        <small class="byline">BY {{ $poster->firstname }} {{ $poster->lastname }}</small>
                                        <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                                    </div>
                                    </a>
                                </div>
                                @endif
                            </div>
                        @endfor

                </div>

                <div class="text-center d-md-none">
                    <button id="btn-more-m" class="btn-more">More</button>
                    <input type="hidden" name="offset" value="{{ $offset }}" id="offsetm">
                    {{--                <input type="hidden" value="{{ $stories->category->id }}" id="category">--}}
                </div>
                <div class="col-lg-4 col-md-4 text-left ">
                    <div class="text-center mb-2">
                        <div id='div-gpt-ad-1485837036191-0' style='width:100%;margin:auto;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837036191-0'); });
                            </script>
                        </div>
                    </div>

                    @include('includes.latest')
                    @include('includes.mostread')

                    @include('includes.social')

                    <div class="my-4">
                        <div class="text-center mb-2">
                            <div id='div-gpt-ad-1485837098208-0' style='width:100%;margin:auto;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837098208-0'); });
                                </script>
                            </div>
                        </div>
                        <h4 class="section-heading mx-0 mt-2">TWITTER FEEDS</h4>
                        <div class="card check">
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            <a class="twitter-timeline" data-height="600"
                               href="https://twitter.com/GameYetu?ref_src=twsrc%5Etfw">Tweets by GameYetu</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center d-none d-md-block">
                <button id="btn-more" class="btn-more">More</button>
                <input type="hidden" name="offset" value="{{ $offset }}" id="offset">
{{--                <input type="hidden" value="{{ $stories->category->id }}" id="category">--}}
            </div>
            <hr class="my-2">
        </div>
    </section>

    <section class="my-2 mx-0">
        <div class="container">
            <div class="ad">
                <div class="row py-1">
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div id='div-gpt-ad-1487330276546-0' style='width:100%;margin:auto;' class="mx-auto">
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1487330276546-0'); });
                            </script>
                        </div>
                    </div>
                </div>
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
                                <img src="{{ asset('assets/images/pic.jpg') }}"
                                     data-src="{{ $articles->getImageLocation().$article->thumbURL }}"
                                     class="card-img-top lazy" alt="{{ $article->title }}">
                            </div>
                            </a>
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
    <script>
        $(document).ready(function () {
            //alert('')
            $('#btn-more').on('click',function () {

                var offset = $('#offset').val();
                //var category = $('#category').val();
                var contextPath = '{{ url('/') }}';
                var url = contextPath + "/videos/more/"+offset;
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

            $('#btn-more-m').on('click',function () {

                var offset = $('#offsetm').val();
                //var category = $('#category').val();
                var contextPath = '{{ url('/') }}';
                var url = contextPath + "/videos/more/"+offset;
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
                        $('#offsetm').val(new_offset);
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

