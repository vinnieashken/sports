

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
                <div class="offset-md-2 col-md-8 mb-3">
                    <div style=" width:100%;  padding: 0px;">
                        <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 aut">
                    <h2 class="text-succes mb-3 w-75">{{ $show->title }}</h2>
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


