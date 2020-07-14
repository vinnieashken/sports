
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

            <amp-ad width=320 height=100 layout="responsive" type="doubleclick" data-slot="/24409412/gameyetu_top_advert" data-multi-size="320x50">
            </amp-ad>

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

        {!! $articles->renderAmp($article->story,$stories->related,2) !!}

        <div class="">
            <h4 class="section-heading my-4">FOLLOW US ON</h4>
            <div class="d-flex mx-auto my-2 follow">
                <div>
                    <div class="socialmedia-buttons btn-group text-center mx-auto">

                        <a href="https://www.facebook.com/GameYetu/"
                           class="btn btn-facebook rounded-0 text-white" style="
                                background: #3b5998;"><span class="fa fa-facebook texu-white"></span></a>

                        <a href="https://twitter.com/gameyetu?lang=en"
                           class="btn btn-facebook rounded-0 text-white" style="
                                background: rgb(0, 126, 196);"><span class="fa fa-twitter texu-white"></span></a>

                        <a href="https://t.me/gameyetu"
                           class="btn btn-facebook rounded-0 text-white" style="
                                background: #0088cc;"><span class="fa fa-telegram texu-white"></span></a>

                        <a href="https://www.instagram.com/game_yetu/?hl=en"
                           class="btn btn-facebook rounded-0 text-white" style="
                                background: #d72978;"><span class="fa fa-instagram texu-white"></span></a>

                    </div>
                </div>
            </div>
        </div>

        <amp-ad width=300 height=250 layout="responsive" type="doubleclick" data-slot="/24409412/gameyetu_rightpanel_advert3" data-multi-size="336x280">
        </amp-ad>
    </article>

    <div>

        <h4 class="section-heading mb-5">LATEST</h4>
        <ul class="list-unstyled mb-md-5">

            @foreach($stories->latest as $article)
                <a href=" {{ url('/amp/'.Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }} " >
                    <li class="media border-design">
                        <div class="big-text mr-3">{{ $loop->index + 1 }}</div>
                        <div class="black">
                            <div class="redimages mb-1">{{ $articles->getCategory($article->categoryid)->name }}</div>
                            {{ $article->title }}
                            <div class="byline mt-2">By {{ $article->author }}</div>
                        </div>
                    </li>
                </a>
            @endforeach

        </ul>
    </div>

</main>


@include('amp.includes.footer')
