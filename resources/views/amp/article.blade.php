
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
            <a href="https://www.facebook.com/sharer.php?u=https://www.standardmedia.co.ke/the-standard-insider/article/2001378263/retirement-blues-unlike-footballers-rugby-players-dont-omba-serikali" class="btn btn-facebook rounded-0 text-white">
                <span class="fa fa-facebook"></span>
            </a>
            <a href="https://web.whatsapp.com/send?text=https://www.standardmedia.co.ke/the-standard-insider/article/2001378263/retirement-blues-unlike-footballers-rugby-players-dont-omba-serikali" class="btn btn-whatsapp rounded-0 text-white">
                <span class="fa fa-whatsapp"></span>
            </a>
            <a href="https://twitter.com/share?url=https://www.standardmedia.co.ke/the-standard-insider/article/2001378263/retirement-blues-unlike-footballers-rugby-players-dont-omba-serikali&amp;hashtags=StandardDigital&amp;text=Retirement+blues%3A+Unlike+footballers%2C+rugby+players+don%E2%80%99t+%E2%80%98omba+serikali%E2%80%99" class="btn btn-twitter rounded-0 text-white">
                <span class="fa fa-twitter texu-white"></span>
            </a>
            <a href="https://telegram.me/share/url?url=https://www.standardmedia.co.ke/the-standard-insider/article/2001378263/retirement-blues-unlike-footballers-rugby-players-dont-omba-serikali&amp;text=Retirement blues: Unlike footballers, rugby players don’t ‘omba serikali’" class="btn btn-telegram rounded-0 text-white">
                <span class="fa fa-telegram"></span>
            </a>
            <a href="" class="btn btn-linkedin rounded-0 text-white">
                <span class="fa fa-linkedin"></span>
            </a>
            <a href="" class="btn btn-email rounded-0 text-white">
                <span class="fa fa-envelope"></span>
            </a>
        </div>

        {!! $articles->renderAmp($article->story) !!}

        </section>
    </article>

</main>


@include('amp.includes.footer')
