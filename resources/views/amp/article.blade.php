
@include('amp.includes.header')

@section('title',trim($article->long_title))
@section('description',trim($article->summary))
@section('keywords',trim(str_replace(';',',',$article->keywords)))
@section('author',trim($article->author))
@section('image','https://cdn.standardmedia.co.ke'.$article->thumbURL)

<main id="content" role="main" class="">

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

    <article class="article-holder">
        <header>

            <h1 class="mb1 px0">{{ $article->title }}</h1>
            <span class="mx1 author">By {{ $article->author }}</span>
            <!-- Start byline -->
            <!-- End byline -->
        </header>

        <div class="socialmedia-buttons btn-group mb-4">
            <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-facebook rounded-0 text-white">
                <span class="fa fa-facebook"></span>
            </a>
            <a href="https://twitter.com/share?url={{ url()->current() }}&hashtags={{ ' ' }}&text={{ urlencode($article->title) }}" class="btn btn-twitter rounded-0 text-white">
                <span class="fa fa-twitter texu-white"></span>
            </a>
            <a href="https://telegram.me/share/url?url={{ url()->current() }}&text={{  $article->title }}" class="btn btn-telegram rounded-0 text-white">
                <span class="fa fa-telegram"></span>
            </a>
            <a href="whatsapp://send?text={{ $article->title.' – '.( url()->current()) }}&utm-source=whatsapp&utm-medium=share&utm-campaign={{ $article->title }}" class="btn btn-whatsapp rounded-0 text-white d-block d-md-none" >
                <span class="fa fa-whatsapp"></span>
            </a>
        </div>

        {!! $articles->renderAmp($article->story) !!}

        </section>
    </article>

</main>


@include('amp.includes.footer')
