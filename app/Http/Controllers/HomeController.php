<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Utils\Articles;
use App\Utils\CookieTool;
use App\Utils\Menu;
use App\Utils\SlideShows;
use App\Utils\TimeUtil;
use App\Utils\Videos;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

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

        $stories = new \stdClass();

//        $query = str_replace(array('?'), array('\'%s\''), $articles->getLatest(6,0)->toSql());
//        $query = vsprintf($query, $articles->getLatest(6,0)->getBindings());
//        dd($query);
//        return;

        //dump($articles->getMostRead());
        //return;

        //dump(Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray())
        //return;

        $home = $articles->getHomepage(6,0);
        $except = $home->pluck('id');

        $stories->top = $home->slice(0,1);

        $stories->top_side1 = $home->slice(1,1);
        $stories->top_side2 = $home->slice(2,1);
        $stories->top_bottom = $home->slice(3,3);

        $stories->latest = $articles->getLatest(4,0);
//            $articles->getFromCategory('football',1,1)
//            ->merge($articles->getFromCategory('boxing',0,1));

        $checkpointexempt = $home->pluck('id') ;

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

        $gallery = $slideshow->getFromcategory('sports',0,10);

        if($gallery->count() < 5)
        {
            $others = $slideshow->get(0,( 5 - $gallery->count() ));
            foreach ($others as $item)
            {
                $gallery->push($item);
            }

        }

        $stories->slideshows = $gallery;

        $stories->volley = $articles->getFromCategory('volleyball and handball',0,2);
        $stories->unique = $articles->getFromCategory('sports',0,2);
        $stories->opinion = $articles->getFromCategoryExclude($checkpointexempt,'gossip & rumours',0,4);

//        $mostRead = Cache::remember("mostread.articlesb", now()->addSeconds(1800),
//            function () use( $articles ) {
//            return $articles->getMostRead(4);
//        });

        $stories->mostread = $articles->getMostReadArticles(4);

        return view('index',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function oldarticle($id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

        $articles = new Articles();
        $article = $articles->getArticle($id);

        if(is_null($article))
        {
            //return;
            $url = 'https://standardmedia.co.ke/article/'.$id.'/'.$slug;
            return redirect()->to($url);
        }
        $url = url('/'.strtolower(Str::slug($articles->getCategory($article->categoryid)->name)).'/'.$article->id.'/'.Str::slug($article->title));

        return redirect()->to($url);
    }

    public function oldarticleslugless($id)
    {
        if(!is_numeric($id))
            return redirect('/');

        $articles = new Articles();
        $article = $articles->getArticle($id);

        if(is_null($article))
        {
            //return;
            $url = 'https://standardmedia.co.ke/article/'.$id;
            return redirect()->to($url);
        }
        $url = url('/'.strtolower(Str::slug($articles->getCategory($article->categoryid)->name)).'/'.$article->id.'/'.Str::slug($article->title));

        return redirect()->to($url);
    }

    public function article(Request $request,$category_slug,$id,$slug=null)
    {
        if(!is_numeric($id))
            return redirect('/');

        $agent = new Agent();
        $menu = new Menu();
        $timeutil = new TimeUtil();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $article = $articles->getArticle($id);
        if(is_null($article))
        {
            if(is_null($slug))
                $url = 'https://standardmedia.co.ke/article/'.$id;
            else
                $url = 'https://standardmedia.co.ke/article/'.$id.'/'.$slug;

            return redirect()->to($url);
        }
//        if($agent->isPhone())
//        {
//            return redirect('/amp/'.strtolower(Str::slug($articles->getCategory($article->categoryid)->name)).'/'.$article->id.'/'.Str::slug($article->title));
//        }
        $stories = new \stdClass();
        $stories->related = $articles->getRelatedArticles($id,6,0);

        if($stories->related->count() < 6)
        {
            $latest = $articles->getLatestExcept($id, (6 - $stories->related->count()),0);

            foreach ($latest as $item)
            {
                $stories->related->push($item);
            }

        }
//        dump($stories->related->count());
//        return;
        $stories->sidevideos = $videos->getFromCategory('sports',0,4);
        $stories->latest = $articles->getLatest(5,0);

        $stories->mostread = $articles->getMostReadArticles(4);

        $cookietool = new CookieTool();

        $cookietool->track();
        if($cookietool->isNearLast() && !Auth::check())
            Session::flash('notifylast',true);

        if($cookietool->enforceLogin())
        {
            Session::flash('loginprompt', 'Login with your Standard account to continue reading more stories');
            $article->story = substr($article->story,0,400).' .... <br /><p><a class="btn btn-success" data-toggle="modal" data-dismiss="modal" data-target="#loginModal" href="#">Login here</a> to read the full story</p>';
            //return redirect(URL::full());
        }


        return view('article',['timeutil'=> $timeutil,'videos' => $videos,'article'=>$article,'articles'=> $articles,'categories'=>$categories,'stories' => $stories]);
    }

    public function category($id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $stories = new \stdClass();
        $stories->top = $articles->getLatestFromCategory($id,0,8)->toArray();
        $stories->bottom = $articles->getLatestFromCategory($id,8,4)->toArray();

        //dump($stories->bottom);
        //return;

        $stories->sidevideos = $videos->getFromCategory('sports',0,3);
        $stories->latest = $articles->getLatest(5,0);

        $stories->mostread = $articles->getMostReadArticles(4);

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
        $stories->latest = $articles->getLatest(5,0);

        $stories->mostread = $articles->getMostReadArticles(4);
        $offset = 13;

        return view('videos',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories'=>$stories,'offset'=>$offset]);
    }

    public function videosmore($offset)
    {
        $videos = new Videos();
        $size = 8;

        $items = $videos->getFromCategory('sports',$offset,$size)->toArray();

        $newoffset = $offset + $size;

        return view('includes.morevideos',['videos'=> $videos,'items'=>$items,'offset'=> $newoffset]);
    }

    public function video($id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

        $menu = new Menu();
        $categories = $menu->getCategories();

        $videos = new Videos();
        $stories = new \stdClass();
        $stories->player = $videos->getVideo($id);
        $stories->videos = $videos->getRelatedVideos($id,4,0);

        return view('video',['categories'=>$categories,'videos'=> $videos,'stories' => $stories]);
    }

    public function author($slug)
    {
        $menu = new Menu();
        $categories = $menu->getCategories();
        $articles = new Articles();
        $videos = new Videos();
        $stories = new \stdClass();
        $name = str_replace('-',' ',$slug);
        $stories->top = $articles->getAuthorStories($name,8,0)->toArray();
        $stories->bottom = $articles->getAuthorStories($name,4,8)->toArray();
        $stories->author = $name;
        $stories->sidevideos = $videos->getFromCategory('sports',0,3);
        $stories->latest = $articles->getLatest(5,0);

        $stories->mostread = $articles->getMostReadArticles(4);

        $offset = 12;

        return view('author',['videos' => $videos,'articles'=> $articles,'categories'=>$categories,'stories'=>$stories,'offset'=>$offset]);
    }
    public function authormore($slug,$offset)
    {
        $articles = new Articles();
        $size = 8;
        $name = str_replace('-',' ',$slug);

        $items = $articles->getAuthorStories($name,$size,$offset)->toArray();

        $newoffset = $offset + $size;

        return view('includes.more_author',['articles'=> $articles,'items'=>$items,'offset'=>$newoffset]);
    }

    public function pictures($id,$slug)
    {
        if(!is_numeric($id))
            return redirect('/');

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
        //$stories->mostread = $articles->getLocalArticles($articles->getMostRead());

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

    public function googlenews(Request $request)
    {
        $articles = new Articles();
        $sitemap = $articles->getTodays();

        $menu = new Menu();
        $categories = $menu->getCategories();

        $categories = $categories->top->merge($categories->more);
        //return;
        return response()->view('googlenews',['sitemap' => $sitemap,'articles'=>$articles,'categories'=> $categories])
            ->header('Content-Type', 'text/xml');
    }

    public function test()
    {

        //dump($this->getMostRead(4));
        $articles = new Articles();
        $agent = new Agent();
        dump($this->getLocalArticles($articles->getMostRead(4)));
    }

    public function getLocalArticles($items)
    {
        $articles = new Articles();
        $ids = [];

        foreach ($items as $item)
        {
            preg_match('/[0-9]+/',$item->url,$matches);
           // array_push($ids,(int)$matches[0]);
            array_push($ids,(int)$matches[0]);
        }

//        dump($ids);
//        return 'hello';

        //return $ids;
        $result = [];
        foreach ( $ids as $id)
        {
            $item = $articles->getArticle($id);
            array_push($result,$item);
        }
        return collect($result);
    }

    public function getMostRead($size=4)
    {
        $params=[
            'key' => "ae48488c6ef1ea95354d3ffb5c496ca8",
            'entities' => [
                'articles' => [
                    'entity' => 'articles',
                    'details' => ['pageviews', 'readability', 'count_pub'],
                ]
            ],
            'options' => [
                'period' => [
                    'name' => 'today'
                ],
                'per_page' => 2300,
            ]
        ];
        $url = 'https://api.onthe.io/ata6CLk8UhmPPvS3PfZYx5wKAloQz24K';

        $params = ["form_params" => $params ];

        //return $params;

        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ],'verify'=> false,'http_errors'=>false]);
        try {

            $response = $client->request('POST', $url, $params);

        }catch (Exception $e)
        {
            Log::error("IO request error".$params['body'].' Details'.$e->getMessage());
        }

        $headers = $response->getHeaders();
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        //dump($body);
        //return;
        $objbody = json_decode($body);

        //return $objbody;

        $sports = [];

        if(! property_exists($objbody,'articles'))
            return [];

        foreach ($objbody->articles->list as $article)
        {
            if(preg_match('/\/sports\/article/',$article->url,$matches))
            {
                array_push($sports,$article);
            }
        }

        return array_slice($sports,0,$size);

        //return $this->getLocalArticles( array_slice($sports,0,$size) );
    }

    public function saveIOResults()
    {
        $articles = new Articles();
        $items = $articles->getMostRead(5);

        foreach ($items as $item)
        {
            preg_match('/[0-9]+/',$item->url,$matches);
            // array_push($ids,(int)$matches[0]);
            $id = (int)$matches[0];

           DB::table('io_cache')->where('articleid',$id)->delete();

            $data = [
                'articleid'=> $id
            ];
            DB::table('io_cache')->insert($data);
        }
    }

}
