
@for($i=0; $i < count($items); $i++)
<div class="card-deck categ">

    <div class="card bg-white mb-4 single-standard">
        <a href="{{ url(Str::slug($articles->getCategory($items[$i]['categoryid'])->name,'-').'/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
            <div class="standard-image">
                <img class="card-img-top lazy"
                     src="{{ asset('assets/images/pic.jpg') }}"
                     data-src="{{ $articles->getImageLocation().$items[$i]['thumbURL'] }}"
                     alt="{{ $items[$i]['title']  }}">
            </div>
            <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
            <div class="card-body pt-4 px-3 pb-3">
                <h5 class="card-title">
                    {{ $items[$i]['title']  }}
                </h5>
                <p class="card-text">
                    {{ $items[$i]['summary'] }}
                </p>
            </div>
            <div class="card-footer bg-white">
                <small class="byline">{{ $items[$i]['author'] }}</small>
                <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
            </div>
        </a>
    </div>
    @php
    $i++;
    @endphp

    @if($i < count($items))
    <div class="card bg-white mb-4 single-standard">
        <a href="{{ url(Str::slug($articles->getCategory($items[$i]['categoryid'])->name,'-').'/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
            <div class="standard-image">
                <img class="card-img-top lazy"
                     src="{{ asset('assets/images/pic.jpg') }}"
                     data-src="{{ $articles->getImageLocation().$items[$i]['thumbURL'] }}"
                     alt="{{ $items[$i]['title']  }}">
            </div>
            <p class="catertitle">{{ $articles->getCategory($items[$i]['categoryid'])->name }}</p>
            <div class="card-body pt-4 px-3 pb-3">
                <h5 class="card-title">
                    {{ $items[$i]['title']  }}
                </h5>
                <p class="card-text">
                    {{ $items[$i]['summary'] }}
                </p>
            </div>
            <div class="card-footer bg-white">
                <small class="byline">{{ $items[$i]['author'] }}</small>
                <small class="byline-two float-right">{{ $items[$i]['publishday'] }}</small>
            </div>
        </a>
    </div>
    @endif
</div>

@endfor

<input type="hidden" id="new_offset" name="newoffset" value="{{ $offset }}">
