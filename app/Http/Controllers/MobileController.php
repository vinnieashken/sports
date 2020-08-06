<?php

namespace App\Http\Controllers;

use App\Utils\Articles;
use App\Utils\Menu;
use App\Utils\TimeUtil;
use App\Utils\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

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
        $stories->url = str_replace('amp/','',url()->current());
        $stories->related = $articles->getRelatedArticles($id,6,0);

        if($stories->related->count() < 6)
        {
            $latest = $articles->getLatestExcept($id, (6 - $stories->related->count()),0);

            foreach ($latest as $item)
            {
                $stories->related->push($item);
            }

        }
        $stories->latest = $articles->getLatest(5,0);

        return view('amp.article',['timeutil'=> $timeutil,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function articleold($id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

        $menu = new Menu();
        $timeutil = new TimeUtil();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $article = $articles->getArticle($id);

        $stories = new \stdClass();
        $stories->url = str_replace('amp/','',url()->current());
        $stories->related = $articles->getRelatedArticles($id,6,0);

        if($stories->related->count() < 6)
        {
            $latest = $articles->getLatestExcept($id, (6 - $stories->related->count()),0);

            foreach ($latest as $item)
            {
                $stories->related->push($item);
            }

        }
        $stories->latest = $articles->getLatest(5,0);

        return view('amp.article',['timeutil'=> $timeutil,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);

        //$url = '/amp/'.Str::slug($articles->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-');
        //return redirect($url);
    }

    public function getCookie(Request $request)
    {
        $cookie = Cookie::get('entertainment_story_no');
        $data = [
            'entertainment_story_no'=> $cookie,
        ];

        dump($data);
    }
}
