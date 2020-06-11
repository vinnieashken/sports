@extends('includes.layout')

@section('title')
     {{ trim($article->long_title) }}
@endsection

@section('description')
    {{ trim($article->summary) }}
@endsection

@section('keywords')
    {{ trim(str_replace(';',',',$article->keywords)) }}
@endsection
@section('author')
    {{ trim($article->author) }}
@endsection
@section('amp')
<link rel="amphtml" href="{{ url('mobile/amp/article/').'/'.$article->id.'/'.Str::slug($article->title) }}">
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
      "logo":{"@type":"ImageObject","url":"{{ url('/assets/images/logo.png') }}","height":64,"width":376}
   },
   "datePublished":"{{ $article->publishday }}",
   "dateModified":"{{ $article->updateddate }}"
}
</script>
<script type="application/ld+json">
            {
             "@context": "http://schema.org",
             "@type": "BreadcrumbList",
             "itemListElement":
             [
              {
               "@type": "ListItem",
               "position": 1,
               "item":
               {
                "@id": "{{url('/')}}",
                "name": "Home"
                }
              },
              {
               "@type": "ListItem",
              "position": 2,
              "item":
               {
                 "@id": "{{ url('category/'.$articles->getCategory($article->categoryid)->id.'/'.Str::slug( $articles->getCategory($article->categoryid)->name,'-') ) }}",
                 "name": "{{ $articles->getCategory($article->categoryid)->name }}"
               }
              },

              }
             ]
            }
</script>




    <section id="standard" class="standard-area pt-100 mt-md-3 mt-lg-3 first">
        <div class="container mx-auto mt-5 mt-lg-0 mt-md-5">

            <div class="row">

            </div>

            <div class="row justify-content-center mt-5">

                <div class="col-md-8 mb-3">
                    <div style="width:100%;  padding: 0px;">
                        <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mt-3">
                    @include('includes.alert')
                </div>

                <div class="col-md-12 col-sm-12">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/category/'.$articles->getCategory($article->categoryid)->id.'/'.\Illuminate\Support\Str::slug($articles->getCategory($article->categoryid)->name)) }}">{{ $articles->getCategory($article->categoryid)->name }}</a></li>
                        </ol>
                    </nav>
                </div>
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
                                                    <div class="fb-comments w-100" data-href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" data-width="100%" data-numposts="30"></div>
                                                    <div class="contact-form w-100">

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
                                                    <a href="{{ url( Str::slug($articles->getCategory($rarticle->categoryid)->name,'-').'/'.$rarticle->id.'/'.str_replace(array('\'', '"'), '', Str::slug( $rarticle->title,'-') ) ) }}">
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
                        <div class="text-left mb-2">
                            <div id='div-gpt-ad-1485837036191-0' style='width:100%;margin:auto;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837036191-0'); });
                                </script>
                            </div>
                        </div>

                        @include('includes.mostread')

                        <div class="text-center">
                            <div id='div-gpt-ad-1485837098208-0' style='width:100%;margin:auto;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1485837098208-0'); });
                                </script>
                            </div>
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
                    items: 1.5
                },
                700: {
                    items: 1.6
                },
                1000: {
                    items: 2
                }
            }
        });

    </script>

@endsection
