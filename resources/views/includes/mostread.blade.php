

<h4 class="section-heading mb-5">MOST READ</h4>
<ul class="list-unstyled">

    @foreach($stories->mostread as $article)
     <a href=" {{ url(Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-')) }} " >
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
