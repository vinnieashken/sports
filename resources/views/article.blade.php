@extends('includes.layout')

@section('title',trim($article->long_title))
@section('description',trim($article->summary))
@section('keywords',trim(str_replace(';',',',$article->keywords)))
@section('author',trim($article->author))
@section('image','https://cdn.standardmedia.co.ke'.$article->thumbURL)

@section('amp')
<link rel="amphtml" href="{{ url('').'/amp/'.$articles->getCategory($article->categoryid)->name.'/'.$article->id.'/'.Str::slug($article->title) }}">
@endsection

@section('content')

    <script>
        window._io_config = window._io_config || {};
        window._io_config["0.2.0"] = window._io_config["0.2.0"] || [];
        window._io_config["0.2.0"].push({
            page_url: "{{ URL::full() }}",
            page_url_canonical: "{{ str_replace('sports','',url('')).'mobile/amp/article/'.$article->id.'/'.Str::slug($article->title) }}",
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
              }
             ]
            }
</script>




    <section id="standard" class="standard-area pt-100 mt-md-3 mt-lg-3 first">
        <div class="container mx-auto mt-lg-0 mt-md-5">

            <div class="row">

            </div>

            <div class="row justify-content-center mt-5">

                <div class="col-md-8 mb-3 col-sm-12">
                    <div style="width:100%;  padding: 0px;" class="mx-auto">
                        <div id='div-gpt-ad-1506941653033-0' style='width:100%;' >
                            <script>
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mt-3">
                    @include('includes.alert')
                </div>

                <div class="col-md-12 col-sm-12 ">
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
                                    <small class="text-muted">Last updated {{ $timeutil->ago(date_create($article->publishdate)) }} | By <a href="{{ url('/author/'.Str::slug($article->author )) }}" >{{ $article->author }}</a></small>
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
{{--                            <img class="card-img-bottom" src="https://cdn.standardmedia.co.ke{{ $article->thumbURL }}" alt="{{ $article->title }}">--}}

                            <div class="card-body">

                                <div>
                                    {!! $articles->renderInAds($article->story,$stories->related,2) !!}
                                </div>

                            </div>

                            <div class="card-body">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" type="text/javascript"></script>
                                <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-2204615711705377" data-ad-slot="7206855923"></ins>
                                <script type="text/javascript">
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
{{--                                <div id="contact" class="contact-area">--}}
{{--                                    <div class="container">--}}
{{--                                        <div class="contact-box mt-70 px-0">--}}
{{--                                            <strong class="text-dark"> </strong>--}}
{{--                                            <p> </p>--}}
{{--                                            <div class="row">--}}

{{--                                                <div class="col-md-12 mx-auto w-100">--}}
{{--                                                    <div id="fb-root" class="w-100"></div>--}}
{{--                                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>--}}
{{--                                                    <div class="fb-comments w-100" data-href="{{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }}" data-width="100%" data-numposts="30"></div>--}}
{{--                                                    <div class="contact-form w-100">--}}

{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <section>

                                    <div class="container py-2 my-1">
                                        @if(count($stories->related ) > 0)
                                        <h4 class="section-heading my-2 mx-0">RELATED NEWS </h4>


                                        <div class="row">
                                            @foreach($stories->related as $rarticle)
                                                <div class="col-md-4 col-sm-12 mb-3">

                                                    <div class="card bg-white mb-4 single-standard">
                                                        <a href="{{ url( Str::slug($articles->getCategory($rarticle->categoryid)->name,'-').'/'.$rarticle->id.'/'.str_replace(array('\'', '"'), '', Str::slug( $rarticle->title,'-') ) ) }}">
                                                            <div class="standard-image">
                                                                <img class="card-img-top related-img lazy"
                                                                     src="{{ asset('assets/images/pic.jpg') }}"
                                                                     data-src="{{ $articles->getImageLocation().$rarticle->thumbURL }}"
                                                                     alt="{{ $rarticle->title }}">
                                                            </div>

                                                            <div class="card-body pt-4 px-3 pb-3">
                                                                <h5 class="card-title" style="font-size: 15px !important;">
                                                                    {{ $rarticle->title  }}
                                                                </h5>
                                                            </div>
                                                            <div class="card-footer bg-white">
                                                                <small class="byline">{{ $rarticle->author }}</small>
                                                            </div>
                                                        </a>
                                                    </div>

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

                                        @endif
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

                        @include('includes.latest')

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
    <section>
        <style>

            body {
                font-family: 'Montserrat', sans-serif;
            }
            h4 {
                display: block;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                font-weight: bolder;
                font-size: 25px;
            }

            h1 {
                display: block;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                font-weight: bolder;
                font-size: 30px;
            }
            .overlay {
                height: 0%;
                width: 100%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: rgb(0,0,0);
                background-color: rgb(255,255,255,0.9);
                overflow-y: hidden;
                transition: 0.5s;
            }
            .font-weight-300 {
                font-weight: 300 !important;
            }
            .font-weight-600 {
                font-weight: 600 !important;
            }
            .font-weight-400 {
                font-weight: 400 !important;
            }
            .text-dark {
                color: #343a40 !important;
            }
            .text-left {
                text-align: left !important;
            }
            a.text-danger:hover, a.text-danger:focus {
                color: #cc0029 !important;
            }
            .heading {
                font-family: 'Montserrat', sans-serif;
            }
            .overlay-content {
                position: relative;
                top: 15%;
                width: 100%;
                text-align: center;
                margin-top: 30px;
            }

            .overlay a {
                padding: 8px;
                text-decoration: none;
                font-size: 36px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .overlay a:hover, .overlay a:focus {
                color: #f1f1f1;
            }

            .overlay .closebtn {
                position: absolute;
                top: 20px;
                right: 45px;
                font-size: 60px;
            }
            .btno:not(:disabled):not(.disabled) {
                cursor: pointer;
            }
            .bg-color {
                background-color: #f03 !important;
                color: white;
            }
            .btno {
                display: inline-block;
                font-weight: 600;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                user-select: none;
                border: .0625rem solid transparent;
                padding: .75rem 1.5rem;
                font-size: .875rem;
                line-height: 1.6;
                border-radius: .375rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .btno-lg, .btno-group-lg  .btno {
                padding: .5rem 7rem;
                margin-top: 30px;
                margin-bottom: 30px;
                font-size: 1.09375rem;
                line-height: 1.5;
                border-radius: .375rem;
            }
            .form-controli {
                display: initial;
                padding: 0.75rem 8.5rem;
                margin-top: 12px;
                font-size: .875rem;
                text-align: center;
                line-height: 1.6;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: .0625rem solid #808386;
                border-radius: .375rem;
                box-shadow: none;
                transition: all 0.2s ease-in-out;
            }
            .overlay a {
                padding: 8px;
                text-decoration: none;
                font-size: 20px;
                color: #0d0c0c;
                display: inline-flex;
            }
            @media screen and (max-height: 450px) {
                .overlay {overflow-y: auto;}
                .overlay a {font-size: 20px}
                .overlay .closebtn {
                    font-size: 40px;
                    top: 15px;
                    right: 35px;
                }
            }

        </style>
        <h2>Modal Example</h2>
        <span style="font-size:30px;cursor:pointer" onclick="openLoginNav()">&#9776; open</span>
    </section>

@endsection

@section('js')
    @if(\Illuminate\Support\Facades\Session::has('loginprompt'))

    <script>
        function openLoginNav() {
            console.log('cliked well');
            document.getElementById("myNav").style.height = "100%";
        }

        function closeLoginNav() {
            document.getElementById("myNav").style.height = "0%";
        }

        $(document).ready(function () {
            //alert('hello');
            console.log('executed');
        });

    </script>
    @endif

    <script>
        $(document).on('click','.socialmedia-buttons a',function(e) {
            e.preventDefault();
            window.open($(this).attr("href"), '_blank',"toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=600");
            return false;
        });
    </script>

    @if(\Illuminate\Support\Facades\Session::has('loginprompt'))
        <script>
            // $(document).ready(function () {
            //     //alert('Hello');
            //
            //     $("#loginModal").modal('show');
            // });

        </script>
    @endif

@endsection
