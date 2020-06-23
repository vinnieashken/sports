@extends('includes.layout')

@section('title',trim($article->long_title))
@section('description',trim($article->summary))
@section('keywords',trim(str_replace(';',',',$article->keywords)))
@section('author',trim($article->author))
@section('image','https://cdn.standardmedia.co.ke'.$article->thumbURL)

@section('amp')
<link rel="amphtml" href="{{ url('mobile/amp/article/').'/'.$article->id.'/'.Str::slug($article->title) }}">
@endsection

@section('content')

    <script>
        window._io_config = window._io_config || {};
        window._io_config["0.2.0"] = window._io_config["0.2.0"] || [];
        window._io_config["0.2.0"].push({
            page_url: "{{ URL::full() }}",
            page_url_canonical: "{{ url('mobile/amp/article/').'/'.$article->id.'/'.Str::slug($article->title) }}",
            page_title: "{{ $article->title }}",
            page_type: "article",
            page_language: "en",
            article_authors: ["{{ $article->author }}","100"],
            article_categories: ["SPORTS"],
            article_subcategories: ["{{ $articles->getCategory($article->categoryid)->name }} "],
            article_type: "longread",
            article_word_count: "{{ str_word_count($article->story) }}",
            article_publication_date: "{{ $article->publishdate }}"
        });
    </script>

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
        <div class="container mx-auto mt-lg-0 mt-md-5">

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

                <div class="col-md-12 col-sm-12 ml-md-5 ml-lg-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/category/'.$articles->getCategory($article->categoryid)->id.'/'.\Illuminate\Support\Str::slug($articles->getCategory($article->categoryid)->name)) }}">{{ $articles->getCategory($article->categoryid)->name }}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                @if(!is_null($article))
                    <div class="col-md-8">

                        <div class="card bg-white art p-3">
                            <div class="card-body">
                                <h3 class="card-title titles">{{ $article->long_title }}</h3>

                                <p class="card-text">
                                    <small class="text-muted">Last updated {{ $timeutil->ago(date_create($article->publishdate)) }} | By {{ $article->author }}</small>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between my-2">
                                <div class="mb-2">
                                    <div class="socialmedia-buttons btn-group">
                                        <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-facebook rounded-0 text-white">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                        <a href="https://twitter.com/share?url={{ url()->current() }}&hashtags={{ ' ' }}&text={{ urlencode($article->title) }}" class="btn btn-twitter rounded-0 text-white">
                                            <span class="fa fa-twitter texu-white"></span>
                                        </a>
                                        <a href="https://telegram.me/share/url?url={{ url()->current() }}&text={{  $article->title }}" class="btn btn-telegram rounded-0 text-white">
                                            <span class="fa fa-telegram"></span>
                                        </a>
                                        <a   href="https://web.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-whatsapp rounded-0 text-white d-none d-md-block" >
                                            <span class="fa fa-whatsapp"></span>
                                        </a>
                                        <a href="whatsapp://send?text={{ $article->title.' – '.( url()->current()) }}&utm-source=whatsapp&utm-medium=share&utm-campaign={{ $article->title }}" class="btn btn-whatsapp rounded-0 text-white d-block d-md-none" >
                                            <span class="fa fa-whatsapp"></span>
                                        </a>
                                        <a href="" class="btn btn-linkedin rounded-0 text-white">
                                            <span  class="fa fa-linkedin"></span>
                                        </a>
                                        <a href="" class="btn btn-email rounded-0 text-white">
                                            <span  class="fa fa-envelope"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <img class="card-img-bottom" src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}" alt="{{ $article->title }}">

                            <div class="card-body">

                                <div>
                                    {!! $articles->renderInAds($article->story,$stories->related,2) !!}
                                </div>
                            </div>

                            <div class="card-body">

                                <div id="contact" class="contact-area">
                                    <div class="container">
                                        <div class="contact-box mt-70 px-0">
                                            <strong class="text-dark"> </strong>
                                            <p> </p>
                                            <div class="row">

                                                <div class="col-md-12 mx-auto w-100">
                                                    <div id="fb-root" class="w-100"></div>
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
                                        <h4 class="section-heading my-2 mx-0">RELATED NEWS </h4>

                                        <div class="owl-carousel slideShow py-1 d-none d-md-block d-lg-block">
                                            @foreach($stories->related as $rarticle)
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
                                            @endforeach
                                        </div>
                                        <style>
                                            .card-img-overlay {
                                                position: absolute;
                                                top: auto;
                                                right: 0;
                                                bottom: 0;
                                                left: 0;
                                                padding: 1.25rem;
                                            }
                                        </style>
                                        <div id="carouselExampleControls" class="carousel slide d-md-none d-lg-none d-block" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($stories->related->slice(0,1) as $rarticle)
                                                <div class="carousel-item active">
                                                    <div class="card bg-dark text-white">
                                                        <a href="{{ url( Str::slug($articles->getCategory($rarticle->categoryid)->name,'-').'/'.$rarticle->id.'/'.str_replace(array('\'', '"'), '', Str::slug( $rarticle->title,'-') ) ) }}">
                                                            <img class="card-img px300" style="height: 300px !important;" src="https://cdn.standardmedia.co.ke{{ $rarticle->thumbURL }}" alt="{{ $rarticle->title }}">
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
                                                </div>
                                                @endforeach
                                                    @foreach($stories->related->slice(1,count($stories->related) - 1) as $rarticle)
                                                        <div class="carousel-item ">
                                                            <div class="card bg-dark text-white">
                                                                <a href="{{ url( Str::slug($articles->getCategory($rarticle->categoryid)->name,'-').'/'.$rarticle->id.'/'.str_replace(array('\'', '"'), '', Str::slug( $rarticle->title,'-') ) ) }}">
                                                                    <img class="card-img px300" style="height: 300px !important;" src="https://cdn.standardmedia.co.ke{{ $rarticle->thumbURL }}" alt="{{ $rarticle->title }}">
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
                                                        </div>
                                                    @endforeach

                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-4 text-left">
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
                    items: 1
                },
                700: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

    </script>

    <script>
        $(document).on('click','.socialmedia-buttons a',function(e) {
            e.preventDefault();
            window.open($(this).attr("href"), '_blank',"toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=600");
            return false;
        });
    </script>

@endsection
