<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Utils\Articles;
use App\Utils\Menu;
use App\Utils\SlideShows;
use App\Utils\Videos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        //\Illuminate\Support\Facades\Auth::logout();
    }

    public function index()
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $slideshow = new SlideShows();

        //->articles->list
        //dump($articles->getMostRead());
        //dump( $articles->getIoArticles($articles->getMostRead()) );
        //return;

        $stories = new \stdClass();
        $stories->top = $articles->getLatest(1,0);

        $stories->top_side1 = $articles->getLatest(1,1);
        $stories->top_side2 = $articles->getLatest(1,2);
        $stories->top_bottom = $articles->getLatest(3,3);
//            $articles->getFromCategory('football',1,1)
//            ->merge($articles->getFromCategory('boxing',0,1))
//            ->merge($articles->getFromCategory('rugby',0,1));

        $stories->checkpoint1 = $articles->getFromCategory('boxing',1,1)
            ->merge($articles->getFromCategory('rugby',1,1))
            ->merge($articles->getFromCategory('athletics',1,1))
            ->merge($articles->getFromCategory('rugby',2,2));

        $stories->checkpoint2 = $articles->getFromCategory('Basketball',0,2)
            ->merge($articles->getFromCategory('premier league',1,1))
            ->merge($articles->getFromCategory('hockey',2,2));

        $stories->videos = $videos->getFromCategory('sports',0,4);
        $stories->slideshows = $slideshow->get(0,10);

        $stories->volley = $articles->getFromCategory('volleyball and handball',0,3);
        $stories->unique = $articles->getFromCategory('sports',0,3);
        $stories->opinion = $articles->getFromCategory('gossip & rumours',0,4);

        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('index',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function article($id,$slug)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $article = $articles->getArticle($id);
        $stories = new \stdClass();
        $stories->related = $articles->getRelatedArticles($id,10,0);
        $stories->sidevideos = $videos->getFromCategory('sports',0,4);
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('article',['videos' => $videos,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function category($id,$slug)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $stories = new \stdClass();
        $stories->top = $articles->getLatestFromCategory($id,0,8)->toArray();
        $stories->bottom = $articles->getLatestFromCategory($id,8,4)->toArray();

        //dump($stories->bottom);
        //return;

        $stories->sidevideos = $videos->getFromCategory('sports',0,6);
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        $stories->opinion = $articles->getFromCategory('gossip & rumours',0,4);

        //dump($stories->top);
        //return;


        return view('category',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories'=>$stories]);
    }

    public function videos()
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $stories = new \stdClass();
        $stories->opinion = $articles->getFromCategory('gossip & rumours',0,4);
        $stories->videos = $videos->getFromCategory('sports',0,13)->toArray();
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('videos',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories'=>$stories]);
    }

    public function video($id,$slug)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();

        $videos = new Videos();
        $stories = new \stdClass();
        $stories->player = $videos->getVideo($id);
        $stories->videos = $videos->getRelatedVideos($id,4,1);

        return view('video',['categories'=>$categories,'videos'=> $videos,'stories' => $stories]);
    }

    public function search(Request $request)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        //$article = $articles->getArticle($id);
        $stories = new \stdClass();
        //$stories->related = $articles->getRelatedArticles($id,10,0);
        $stories->sidevideos = $videos->getFromCategory('sports',0,4);
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('search',['articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }
}
