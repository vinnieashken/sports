

<h4 class="section-heading my-4 mx-0 text-left">SPORTS VIDEOS</h4>
<div class="card diff ">

    <div class="card-body vedeos vids p-0">

        @foreach($stories->sidevideos as $video)
            <a href="{{ url('/video/'.$video->id.'/'.Str::slug($video->title)) }}">
                <div class="media my-2 mt-3">
                    <div class="single-standard">
                        <i class="fa fa-play vidasmall"></i>
                        <img src="https://i.ytimg.com/vi/{{$video->videoURL}}/hqdefault.jpg"
                             class="mr-md-3" alt="{{ $video->title }}">
                    </div>
                    <div class="media-body ml-3 ml-md-0 black">

                        <div class="black-two">
                            {{ $video->title }}
                        </div>
                        @php($poster = $videos->getVideoPoster($video->createdBy))
                        <div class="byline mt-2">By {{ $poster->firstname }} {{ $poster->lastname }}</div>
                    </div>
                </div>
            </a>
        <hr class="my-2">
        @endforeach

    </div>
</div>
