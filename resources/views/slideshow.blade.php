

@extends('includes.layout')

@section('title')
    {{ ' ' }}
@endsection

@section('description')
    {{ ' '  }}
@endsection

@section('content')
    <section id="standard" class="standard-area pt-100 homept mt-md-2 mt-lg-3 first">
        <div class="container mx-auto mt-4 mt-lg-0 mt-md-5">
            <div class="row my-2">
            </div>
            <div class="row">
                <div class="ad-728-90 offset-md-2 col-md-8 mb-3 d-none d-md-block d-lg-block">
                    <div style=" width:100%;  padding: 0px;">

                        <div id='div-gpt-ad-1486010480522-0' style='height:90px; width:728px;margin:0px auto 0px auto'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1486010480522-0'); });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 aut">
                    <h2 class="d-none text-succes mb-3 w-75">Has Paul Pogba changed his mind on leaving Man United?</h2>
                    <!--                <div class="justify-content-around"><span>uytguytguy</span><span>uytguytguy</span><span>uytguytguy</span></div>-->
                    <div class="row">

                        @foreach($pictures as $picture)
                        <div class="col-md-4">
                            <div class="card mb-4 single-standard">
                                <div class="standard-image">
                                    <img class="card-img-top" src="{{ env('IMAGECDN').$picture->imgURL }}" alt="Card image cap" onclick="openModal();currentSlide(1)">
                                </div>
                            </div>
                        </div>
                       @endforeach

                    </div>
                    <h5 class="d-none more my-4">LOAD MORE</h5>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection


