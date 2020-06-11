

@extends('includes.layout')

@section('title')
    {{ $show->title }}
@endsection

@section('description')
    {{ $pictures->first()->description }}
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
    <!--lightbox modal-->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close cursor" onclick="closeModal()">&times;</span>

            @foreach($pictures as $picture)
            <div class="mySlides bigg">
                <div class="numbertext">{{ $loop->index + 1 }} / {{ $pictures->count() }}</div>
                <img src="{{ env('IMAGECDN').$picture->imgURL }}" style="width:100%" alt="{{ $picture->description }}">
            </div>
            @endforeach

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row lower">

                @foreach($pictures as $picture)
                <div class="col">
                    <img class="demo cursor" src="{{ env('IMAGECDN').$picture->imgURL }}" style="width:100%"
                         onclick="currentSlide({{ $loop->index + 1 }})" alt="{{ $picture->description }}">
                </div>
                @endforeach

            </div>

        </div>
    </div>
    <!--lightbox-->
@endsection

@section('js')
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
@endsection


