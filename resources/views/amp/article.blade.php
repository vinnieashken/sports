
@include('amp.includes.header')

<main id="content" role="main" class="">
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
