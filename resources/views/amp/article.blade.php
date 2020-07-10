
@include('amp.includes.header')

<main id="content" role="main" class="">
    <article class="article-holder">
        <header>

            <h1 class="mb1 px0">{{ $article->title }}</h1>
            <span class="mx1 author">By {{ $article->author }}</span>
            <!-- Start byline -->
            <div class="btn-group float-right">
                <a  href="https://www.facebook.com/sharer.php?u=https://www.standardmedia.co.ke/evewoman/crazy-monday/article/2001378124/five-reasons-your-child-is-acting-out-and-how-to-handle-it">
                    <amp-img src="https://img.icons8.com/color/50/000000/facebook-circled.png" width="48" height="48" class="mx1"></amp-img>
                </a>
                <a  href="https://twitter.com/share?url=https://www.standardmedia.co.ke/evewoman/crazy-monday/article/2001378124/five-reasons-your-child-is-acting-out-and-how-to-handle-it">
                    <amp-img src="https://img.icons8.com/color/50/000000/twitter-circled.png" width="48" height="48" class="mx1"></amp-img>
                </a>
                <a  href="https://telegram.me/share/url?url=https://www.standardmedia.co.ke/evewoman/crazy-monday/article/2001378124/five-reasons-your-child-is-acting-out-and-how-to-handle-it">
                    <amp-img src="https://img.icons8.com/fluent/48/000000/telegram-app.png" width="48" height="48" class="mx1"></amp-img>
                </a>
                <a href="https://web.whatsapp.com/send?text=https://www.standardmedia.co.ke/evewoman/crazy-monday/article/2001378124/five-reasons-your-child-is-acting-out-and-how-to-handle-it">
                    <amp-img src="https://www.standardmedia.co.ke/evewoman/images/whatsapp.png" width="48" height="48" class="mx1"></amp-img>
                </a>
            </div>
            <!-- End byline -->
        </header>


        </section>
    </article>

</main>


@include('amp.includes.footer')
