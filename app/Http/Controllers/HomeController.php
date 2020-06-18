<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Utils\Articles;
use App\Utils\Menu;
use App\Utils\SlideShows;
use App\Utils\TimeUtil;
use App\Utils\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


        //dump( $categories->top->pluck('name')->toArray() );
        //return;

        $stories = new \stdClass();
        $stories->top = $articles->getLatest(1,0);

        $stories->top_side1 = $articles->getLatest(1,1);
        $stories->top_side2 = $articles->getLatest(1,2);
        $stories->top_bottom = $articles->getLatest(3,3);
//            $articles->getFromCategory('football',1,1)
//            ->merge($articles->getFromCategory('boxing',0,1))
//            ->merge($articles->getFromCategory('rugby',0,1));

//        $default1 = $articles->getFromCategory('boxing',1,1)
//            ->merge($articles->getFromCategory('rugby',1,1))
//            ->merge($articles->getFromCategory('athletics',1,1))
//            ->merge($articles->getFromCategory('rugby',2,2));
//
//        $default2 = $articles->getFromCategory('Basketball',0,2)
//            ->merge($articles->getFromCategory('premier league',1,1))
//            ->merge($articles->getFromCategory('hockey',2,2));

        $checkpointexempt = $articles->getLatest(6,0)->pluck('id') ;


        //dump(array_merge($categories->top->pluck('id')->toArray(),$categories->more->pluck('id')->toArray()));
        //return;


        $checkpoint = $articles->getCheckpoint('local',0,10);

        if($checkpoint->count() < 10)
        {
            $others = $articles->getCheckpoint('kenya',0, (10 - $checkpoint->count()) ,$checkpointexempt);
            foreach ($others as  $item)
            {
                $checkpoint->push($item);
            }
        }

        $stories->checkpoint1 = $checkpoint->slice(0,5);
        $stories->checkpoint2 = $checkpoint->slice(5,5);

        $stories->videos = $videos->getFromCategory('sports',0,4);
        $stories->slideshows = $slideshow->get(0,10);

        $stories->volley = $articles->getFromCategory('volleyball and handball',0,2);
        $stories->unique = $articles->getFromCategory('sports',0,2);
        $stories->opinion = $articles->getFromCategory('gossip & rumours',0,4);

        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('index',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function oldarticle($id,$slug)
    {
        $articles = new Articles();
        $article = $articles->getArticle($id);

        if(is_null($article))
        {
            //return;
        }
        $url = url('/'.strtolower(Str::slug($articles->getCategory($article->categoryid)->name)).'/'.$article->id.'/'.Str::slug($article->title));

        return redirect()->to($url);
    }

    public function oldarticleslugless($id)
    {
        $articles = new Articles();
        $article = $articles->getArticle($id);

        if(is_null($article))
        {
            //return;
        }
        $url = url('/'.strtolower(Str::slug($articles->getCategory($article->categoryid)->name)).'/'.$article->id.'/'.Str::slug($article->title));

        return redirect()->to($url);
    }

    public function article($category_slug,$id,$slug)
    {
        $menu = new Menu();
        $timeutil = new TimeUtil();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $article = $articles->getArticle($id);
        $stories = new \stdClass();
        $stories->related = $articles->getRelatedArticles($id,4,0);

        if($stories->related->count() < 4)
        {
            $latest = $articles->getLatestExcept($id, (4 - $stories->related->count()),0);

            foreach ($latest as $item)
            {
                $stories->related->push($item);
            }

        }
//        dump($stories->related->count());
//        return;
        $stories->sidevideos = $videos->getFromCategory('sports',0,4);
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('article',['timeutil'=> $timeutil,'videos' => $videos,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
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

        $stories->category = $articles->getCategory($id);

        $stories->opinion = $articles->getFromCategory('gossip & rumours',0,4);

        //dump($stories->top);
        //return;
        $offset = 12;

        return view('category',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories'=>$stories,'offset'=>$offset]);
    }

    public function categorymore($id,$offset)
    {
        $articles = new Articles();
        $size = 8;

        $items = $articles->getLatestFromCategory($id,$offset,$size)->toArray();

        $newoffset = $offset + $size;

        return view('includes.more_category',['articles'=> $articles,'items'=>$items,'offset'=>$newoffset]);
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
        $stories->videos = $videos->getRelatedVideos($id,4,0);

        return view('video',['categories'=>$categories,'videos'=> $videos,'stories' => $stories]);
    }

    public function pictures($id,$slug)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $slideshows = new SlideShows();
        $pictures = $slideshows->getPictures($id);
        $slideshow = $slideshows->getSlideShow($id);
        return view('slideshow',['categories'=>$categories,'pictures'=> $pictures,'show'=> $slideshow]);
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
        //$stories->sidevideos = $videos->getFromCategory('sports',0,4);
        $stories->mostread = $articles->getLocalArticles($articles->getMostRead());

        return view('search',['articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function sitemap(Request $request)
    {
        $articles = new Articles();
        $sitemap = $articles->getTodays();

        $menu = new Menu();
        $categories = $menu->getCategories();

        $categories = $categories->top->merge($categories->more);
        //return;
        return response()->view('sitemap',['sitemap' => $sitemap,'articles'=>$articles,'categories'=> $categories])
            ->header('Content-Type', 'text/xml');
    }
}
