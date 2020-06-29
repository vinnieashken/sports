<?php


namespace App\Utils;


use App\Models\Article;
use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class Articles
{
    public function __construct()
    {
        date_default_timezone_set('Africa/Nairobi');
    }

    public function getFromCategory($category,$offset,$size)
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $cat = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->where('name',$category)->get(['id','name','shortname'])->first();

        return Article::on('mysql')->orderBy('publishday','DESC')->orderBy('parentcategorylistorder','ASC')->where('categoryid',$cat->id)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getFromCategoryExclude($filter,$category,$offset,$size)
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $cat = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->where('name',$category)->get(['id','name','shortname'])->first();

        return Article::on('mysql')->orderBy('publishday','DESC')
            ->orderBy('parentcategorylistorder','ASC')
            ->where('categoryid',$cat->id)
            ->whereNotIn('id',$filter)
            ->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatestFromCategory($category,$offset,$size)
    {

        return Article::on('mysql')->orderBy('publishday','DESC')
            ->orderBy('parentcategorylistorder','ASC')->where('categoryid',$category)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatest($size,$offset=0)
    {

        return Article::on('mysql')
            ->whereIn('categoryid',Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray())
            ->whereNull('inactive')
            ->where('publishdate',"<=",date("Y-m-d H:i:s"))
            //->where('listorder','>',0)
            ->orderBy('publishdate','DESC')
            ->orderBy('homepagelistorder','ASC')
            ->orderBy('listorder','ASC')

            ->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatestExcept($id,$size,$offset=0)
    {

        $categories = Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray();

        return Article::on('mysql')
            ->orderBy('publishday','DESC')
            ->orderBy('homepagelistorder','ASC')
            ->orderBy('listorder','ASC')
            ->whereNull('inactive')
            ->where('publishdate',"<=",date("Y-m-d H:i:s"))
            ->whereIn('categoryid',$categories)->whereNotIn('id',[(int)$id])->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getAuthorStories($name,$size,$offset=0)
    {
        $categories = Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray();

        return Article::on('mysql')
            ->orderBy('publishday','DESC')
            ->orderBy('homepagelistorder','ASC')
            ->orderBy('listorder','ASC')
            ->whereNull('inactive')
            ->where('author',$name)
            ->where('publishdate',"<=",date("Y-m-d H:i:s"))
            ->whereIn('categoryid',$categories)
            ->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getTodays()
    {

        $categories = Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray();

        return Article::on('mysql')->orderBy('publishday','DESC')->whereNull('inactive')->whereIn('categoryid',$categories)
            ->where('publishday',date('Y-m-d'))->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getCheckpoint($keyword,$offset,$size,$except=array())
    {
        $categories = Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray();

        if(!empty($except))
        {
            return Article::on('mysql')
                ->whereIn('categoryid',$categories)
                ->whereNotIn('id',$except)
                ->whereNull('inactive')
                ->where('keywords','like','%'.$keyword.'%')
                ->where('publishday',"<=",date("Y-m-d H:i:s"))
                ->orderBy('publishdate','DESC')
                ->orderBy('homepagelistorder','ASC')
                ->orderBy('listorder','ASC')

                ->offset($offset)->limit($size)
                ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
        }
        return Article::on('mysql')
            ->whereIn('categoryid',$categories)
            ->whereNull('inactive')
            ->where('keywords','like','%'.$keyword.'%')
            ->where('publishdate',"<=",date("Y-m-d H:i:s"))
            ->orderBy('publishdate','DESC')
            ->orderBy('homepagelistorder','ASC')
            ->orderBy('listorder','ASC')

            ->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getCategory($id)
    {
        return Category::on('mysql')->where('id',$id)->get(['id','name','shortname'])->first();
    }

    public function getArticle($id)
    {
        $article = Article::where('id',$id)->get(['id','categoryid','title','long_title','summary','story','keywords','thumbURL','publishday','publishdate','updateddate','author'])->first();
        if(is_null($article))
        {
            $article = Article::on('mysql2')->where('id',$id)->get(['id','categoryid','title','long_title','summary','story','thumbURL','keywords','publishday','updateddate','publishdate','author'])->first();
            if(is_null($article))
            {
                $article = Article::on('mysql3')->where('id',$id)->get(['id','categoryid','title','long_title','summary','story','thumbURL','keywords','publishday','publishdate','updateddate','author'])->first();
            }
        }
        return $article;
    }

    public function getRelatedArticles($id,$size,$offset = 0)
    {
        $article = Article::where('id',$id)->get(['id','title','keywords','thumbURL','publishday','author'])->first();


        $categories = Category::on('mysql')->where('id',6)->orWhere('parentid',6)->whereNull('inactive')->get(['id'])->pluck('id')->toArray();

        $related = Article::query();

        $keywords = explode(';',$article->keywords);

        $related->orderBy('publishdate','DESC')->where('keywords', 'LIKE', '%'.$keywords[0].'%');

        foreach(array_slice($keywords,1,count($keywords) - 1 ) as $keyword){

            $related->orWhere('keywords', 'LIKE', '%'.$keyword.'%');
        }

        return $related->whereIn('categoryid',$categories)->offset($offset)->limit($size)->get(['id','categoryid','title','thumbURL','summary','author','publishday'])
            ->reject(function ($item) use ($id) {
                return $item->id == $id;
            })->reject(function ($item) use ($categories){
                return !in_array($item->categoryid,$categories);
            });
    }

    public function renderInAds($story,$collection,$count = 2)
    {
        //dump($collection->nth(1));
        //return;

        $adbegin ='<p class="card-text"> <a href="';
        $middle = '"> SEE ALSO: ';
        $adend = ' </a>  </p>';
        $size = $collection->count();

        $story = explode('</p>',$story);
        $x = 0;
        $result ='';  //$result.=$size;
        foreach($story as $key => $value)
        {
            $result .= $value;
            //$result .= '<p>'.$x.' '.$count.'</p>';
            if($x % $count){

                if($key < $size)
                {
                    $article = $collection->get($key);
                    if(!is_null($article))
                    {
                        $url = url(Str::slug($this->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-'));
                        $result .= $adbegin.$url.$middle.$article->title.$adend;
                    }

                }

            }
            if($x == 1 && \Jenssegers\Agent\Facades\Agent::isMobile())
            {
                $result .= '<div class="text-left mb-2">
                            <div id=\'div-gpt-ad-1485837036191-0\' style=\'width:100%;margin:auto;\'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1485837036191-0\'); });
                                </script>
                            </div>
                        </div>';
            }
            if($x == 7 && \Jenssegers\Agent\Facades\Agent::isMobile() )
            {
                $result .= '<div class="text-center">
                            <div id=\'div-gpt-ad-1485837098208-0\' style=\'width:100%;margin:auto;\'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1485837098208-0\'); });
                                </script>
                            </div>
                        </div>';
            }
            $x++;
        }
        return str_replace('/images',env('IMAGECDN').'/images',$this->str_replace_first('/images','',$result));
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

    public function getLocalArticles($items)
    {
        $ids = [];

        foreach ($items as $item)
        {
            preg_match('/[0-9]+/',$item->url,$matches);
            array_push($ids,(int)$matches[0]);
        }

        //return $ids;
        return Article::whereIn('id',$ids)->get(['id','categoryid','title','keywords','thumbURL','publishday','author']);
    }

    function str_replace_first($from, $to, $content)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return preg_replace($from, $to, $content, 1);
    }

    public function shorten($category,$text, $limit)
    {
        if(strlen($category.$text) > $limit)
            return substr($text,0,$limit).'...';
        return $text;
    }
}
