<?php

namespace App\Http\Controllers;

use App\Utils\Articles;
use App\Utils\Menu;
use App\Utils\TimeUtil;
use App\Utils\Videos;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    //
    public function __construct()
    {
    }

    public function article($categoryslug,$id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

        $menu = new Menu();
        $timeutil = new TimeUtil();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $article = $articles->getArticle($id);
        $stories = new \stdClass();
        $stories->url = url()->current();

        return view('amp.article',['timeutil'=> $timeutil,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }
}
