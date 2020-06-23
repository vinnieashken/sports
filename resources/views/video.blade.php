

@extends('includes.layout')

@section('title')
    {{ $stories->player->title }}
@endsection

@section('description')
    {{ $stories->player->description  }}
@endsection

@section('content')

    <section id="standard" class="standard-area pt-10">
        <div class="row">
            <div class="col-md-10 col-sm-12 mt-md-5 mx-auto">
                @include('includes.alert')
            </div>
        </div>

        <div class="row">
            <div class="offset-md-3 col-md-8 mb-3">
                <div style="width:100%;  padding: 0px;">
                    <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                        <script>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        {!! $videos->player($stories->player) !!}
{{--        <p class="vititle">ATHLETICS</p></section>--}}

    <section class="opinions mt-5">
        <div class="container">
            @if( count( $stories->videos ) > 0)
            <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">RELATED VIDEOS</h4>
            @endif

            <div class="card-deck ">

                @foreach($stories->videos as $video)
                <div class="card">
                    <a href="{{ url('video/'.$video->id.'/'.Str::slug($video->title,'-')) }}" >
                    <div class="single-standard">

                        <div class="standard-image">
                            <img src="https://i.ytimg.com/vi/{{$video->videoURL}}/hqdefault.jpg"
                                 class="card-img-top" alt="{{ $video->title }}">
                        </div>
                            <i class="fa fa-play relv"></i>
                    </div>
                    <div class="card-body p-3 bg-white">
                        <h4 class="black py-2">
                            <a href="{{ url('video/'.$video->id.'/'.Str::slug($video->title,'-')) }}" class="text-color">
                                {{ $video->title }}
                            </a>
                        </h4>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    </section>

@endsection

@section('js')

@endsection


