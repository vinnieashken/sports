@extends('includes.layout')

@section('title')
    | {{ $article->long_title }}
@endsection

@section('metas')
    <meta name="keywords" content="Man kyura,Toma, dick, harry">
@endsection

@section('content')
    <script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "NewsArticle",
   "url": "{{ \Illuminate\Support\Facades\URL::full() }}",
   "headline": "{{ substr($article->long_title,0,110) }}",
   "mainEntityOfPage": "{{ \Illuminate\Support\Facades\URL::full() }}",
   "articleBody": "{{ $article->story }}",
   "image":{"@type":"ImageObject","url":"https://cdn.standardmedia.co.ke{{ $article->thumbURL }}","height":500,"width":800},
   "articleSection":"News",
   "author":["{{ $article->author }}"],
   "keywords": {!! json_encode(explode(';',$article->keywords)) !!},
   "publisher":{
      "@type":"Organization",
      "name":"Standard Sports",
      "logo":"{{ url('/assets/images/logo.png') }}"
   },
   "datePublished":"{{ $article->publishday }}",
   "dateModified":"{{ $article->updateddate }}"
}
</script>


    <section id="standard" class="standard-area pt-100 mt-md-3 mt-lg-3 first">
        <div class="container mx-auto mt-5 mt-lg-0 mt-md-5">
            <div class="row justify-content-center mt-5">
                @if(!is_null($article))
                    <div class="col span_2_of_3 aut">

                        <div class="card bg-white art">
                            <div class="card-body">
                                <h3 class="card-title titles">{{ $article->long_title }}</h3>
                                <p class="card-text">
                                    <small class="text-muted">Last updated {{ $timeutil->ago(date_create($article->publishdate)) }}</small>
                                </p>
                            </div>
                            <img class="card-img-bottom" src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}" alt="{{ $article->title }}">
                            <h5 class="caption pb-0 mx-5 p-2 mb-2">
                                {{ $article->title }}
                            </h5>
                            <div class="card-body">

                                <div>
                                    {!! $articles->renderInAds($article->story) !!}
                                </div>
                            </div>

                            <div class="card-body">

                                <div id="contact" class="contact-area">
                                    <div class="container">
                                        <div class="contact-box mt-70">
                                            <strong class="text-dark"> </strong>
                                            <p> </p>
                                            <div class="row">

                                                <div class="mx-auto w-100">
                                                    <div id="fb-root"></div>
                                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
                                                    <div class="fb-comments" data-href="{{ url('article/'.$article->id.'/'.Str::slug($article->title,'-')) }}" data-width="100%" data-numposts="30"></div>
                                                    <div class="contact-form">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <section>

                                    <div class="container py-2 my-1">
                                        @if(count($stories->related) == 1 && $stories->related->first()->id !== $article->id)
                                        <h4 class="section-heading my-2 mx-0">RELATED NEWS </h4>
                                        @elseif(count($stories->related) > 1 )
                                            <h4 class="section-heading my-2 mx-0">RELATED NEWS </h4>
                                        @endif

                                        <div class="owl-carousel slideShow py-1">
                                            @foreach($stories->related as $rarticle)
                                                @if($rarticle->id !== $article->id)
                                                <div class="card bg-dark text-white">
                                                    <a href="{{ url('article/'.$rarticle->id.'/'.Str::slug($rarticle->title,'-')) }}">
                                                        <img class="card-img px300" style="height: 300px !important;"
                                                             src="https://cdn.standardmedia.co.ke{{ $rarticle->thumbURL }}" alt="{{ $rarticle->title }}">
                                                        <div class="card-img-overlay">
                                                            <h5 class="card-title text-white">
                                                                {{ $rarticle->title }}
                                                            </h5>
                                                            <p class="card-text">
                                                    <span class="catebtn mr-1">
                                                       {{ $articles->getCategory($rarticle->categoryid)->name }}
                                                    </span> <span class="byln">BY {{ $rarticle->author }} | {{ $rarticle->publishdate }} </span>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col span_1_of_3 text-left">
                    <div class="bg-white p-3">
                        <div class="text-left">
                            <img src="https://tpc.googlesyndication.com/simgad/68460162182615902" class="mediumad my-4 mt-md-0">
                        </div>

                        @include('includes.mostread')

                        <div class="text-center">
                            <img src="https://tpc.googlesyndication.com/simgad/68460162182615902" class="mediumad my-4 mt-md-0">
                        </div>

                        @include('includes.videos_section')

                        @include('includes.social')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')



@endsection
