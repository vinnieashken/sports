<?php


namespace App\Utils;


use App\Models\Video;
use App\Models\VideoCategory;

class Videos
{
    public function __construct()
    {
    }

    public function getFromCategory($category,$offset,$size)
    {
        $cat = VideoCategory::on('mysql')->whereNull('inactive')->where('name',$category)->get(['id','name'])->first();

        return Video::on('mysql')->orderBy('publishdate','DESC')->orderBy('listorder','ASC')->where('categoryid',$cat->id)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','videoURL','description','publishdate']);
    }

    public function getVideo($id)
    {
        return Video::on('mysql')->where('id',$id)
            ->get(['id','categoryid','title','videoURL','description','publishdate','platform','vimeoembed','producer','reporter'])->first();
    }

    public function player($video)
    {
        if($video->platform == 'youtube')
        {
            return '<iframe frameborder="0" width="640" height="660" src="https://www.youtube.com/watch?v='.$video->videoURL.'?autoplay=1" allowfullscreen="" allow="autoplay"></iframe>';
        }
        if($video->platform == 'dailymotion')
            {
                return '<iframe frameborder="0" width="640" height="660" src="https://www.dailymotion.com/embed/video/'.$video->videoURL.'?autoplay=1" allowfullscreen="" allow="autoplay"></iframe>';
            }
        if($video->platform == 'vimeo')
            {
                return $video->vimeoembed;
            }
        return 'FALSE';

    }

    public function getRelatedVideos($id,$size,$offset = 0)
    {
        $video = Video::on('mysql')->where('id',$id)
            ->get(['id','categoryid','title','videoURL','description','publishdate','keywords'])->first();

        $related = Video::query();
        $keywords = explode(';',$video->keywords);

        $related->orderBy('publishdate','DESC')->whereNotIn('id',[$id])->where('keywords', 'LIKE', '%'.$keywords[0].'%');

        foreach(array_slice($keywords,1,count($keywords) - 1 ) as $keyword){

            $related->orWhere('keywords', 'LIKE', '%'.$keyword.'%');
        }

        return $related->offset($offset)->limit($size)->get(['id','categoryid','title','videoURL','description','publishdate','keywords']);
    }
}
