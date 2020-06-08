

@extends('includes.layout')

@section('title')
    | home
@endsection

@section('metas')
    <meta name="keywords" content="Man kyura,Toma, dick, harry">
@endsection

@section('content')
    <section id="standard" class="standard-area pt-10">
        {!! $videos->player($stories->player) !!}
        <p class="vititle">ATHLETICS</p></section>

    <section class="opinions mt-5">
        <div class="container">
            @if( count( $stories->videos ) > 0)
            <h4 class="section-heading my-2 mx-0 mt-md-0 w-100">RELATED VIDEOS</h4>
            @endif

            <div class="card-deck ">

                @foreach($stories->videos as $video)
                <div class="card">
                    <a href="{{ url('video/'.$video->id.'/'.Str::slug($video->title,'-')) }}">
                    <div class="single-standard">

                        <div class="standard-image">
                            <img src="https://i.ytimg.com/vi/{{$video->videoURL}}/hqdefault.jpg"
                                 class="card-img-top" alt="{{ $video->title }}">
                        </div>
                        <i class="fa fa-play relv"></i>
                    </div>
                    <div class="card-body p-3 bg-white">
                        <h4 class="black py-2">
                            <a href="#"class="text-color">
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
@endsection

@section('js')

@endsection


