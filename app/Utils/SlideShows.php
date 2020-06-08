<?php


namespace App\Utils;


use App\Models\SlideShow;
use App\Models\SlideShowPicture;

class SlideShows
{
    public function get($offset,$size)
    {
        return SlideShow::on('mysql')->orderBy('publishdate','DESC')->whereNull('inactive')->where('source','main')->offset($offset)->limit($size)
            ->get(['id','title','imgURL','publishdate']);
    }

    public function getPictures($slideshowid)
    {
        return SlideShowPicture::on('mysql')->orderBy('listorder','ASC')->where('slideshowid',$slideshowid)->get(['id','title','imgURL','description']);
    }
}
