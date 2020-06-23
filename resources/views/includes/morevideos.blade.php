

@for($i=0; $i < count($items); $i++)
    <div class="card-deck categ">
        <div class="card bg-white mb-4 single-standard">
            <a href="{{ url('video/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                <div class="standard-image">
                    <i class="fa fa-play smallblack"></i>
                    <img class="card-img-top"
                         src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                         alt="Card image cap">
                </div>
                {{--                                    <p class="catertitle">ARCHERY</p>--}}
                <div class="card-body pt-4">
                    <h5 class="card-title">
                        {{ $items[$i]['title'] }}
                    </h5>
                    <p class="card-text">
                        {!! $items[$i]['description'] !!}
                    </p>
                </div>
                <div class="card-footer bg-white">
                    @php
                        $poster = $videos->getVideoPoster($items[$i]['createdBy']);
                    @endphp
                    <small class="byline">BY {{ $poster->firstname }} {{ $poster->lastname }}</small>
                    <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                </div>
            </a>
        </div>
        @php
            $i++;
        @endphp
        @if($i < count($items))
            <div class="card bg-white mb-4 single-standard">
                <a href="{{ url('video/'.$items[$i]['id'].'/'.Str::slug($items[$i]['title'],'-')) }}">
                    <div class="standard-image">
                        <i class="fa fa-play smallblack"></i>
                        <img class="card-img-top"
                             src="https://i.ytimg.com/vi/{{ $items[$i]['videoURL'] }}/hqdefault.jpg"
                             alt="Card image cap">
                    </div>

                    {{--                                    <p class="catertitle">ARCHERY</p>--}}

                    <div class="card-body pt-4">
                        <h5 class="card-title">
                            {{ $items[$i]['title'] }}
                        </h5>
                        <p class="card-text">
                            {!! $items[$i]['description'] !!}
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        @php
                            $poster = $videos->getVideoPoster($items[$i]['createdBy']);
                        @endphp
                        <small class="byline">BY {{ $poster->firstname }} {{ $poster->lastname }}</small>
                        <small class="byline-two float-right">{{ $items[$i]['publishdate'] }}</small>
                    </div>
                </a>
            </div>
        @endif
    </div>
@endfor

<input type="hidden" id="new_offset" name="newoffset" value="{{ $offset }}">
