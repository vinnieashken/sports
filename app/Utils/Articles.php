<?php


namespace App\Utils;


use App\Models\Article;
use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Articles
{
    public function getFromCategory($category,$offset,$size)
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $cat = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->where('name',$category)->get(['id','name','shortname'])->first();

        return Article::on('mysql')->orderBy('publishday','DESC')->orderBy('parentcategorylistorder','ASC')->where('categoryid',$cat->id)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatestFromCategory($category,$offset,$size)
    {

        return Article::on('mysql')->orderBy('publishday','DESC')->orderBy('parentcategorylistorder','ASC')->where('categoryid',$category)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatest($size,$offset=0)
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $categories = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->get(['id'])->pluck('id');

        return Article::on('mysql')->orderBy('publishday','DESC')->orderBy('homepagelistorder','ASC')->orderBy('listorder','ASC')->whereNull('inactive')->whereNotNull('homepagelistorder')->where('listorder','>',0)->whereIn('categoryid',$categories)->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getLatestExcept($id,$size,$offset=0)
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $categories = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->get(['id'])->pluck('id');

        return Article::on('mysql')->orderBy('publishday','DESC')->orderBy('homepagelistorder','ASC')->orderBy('listorder','ASC')->whereNull('inactive')->whereNotNull('homepagelistorder')->where('listorder','>',0)
            ->whereIn('categoryid',$categories)->whereNotIn('id',[(int)$id])->offset($offset)->limit($size)
            ->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
    }

    public function getTodays()
    {
        $parent = Category::on('mysql')->where('site','main')->whereNull('inactive')->where('parentid',0)->where('name','like','%sports%')->first();
        $categories = Category::on('mysql')->whereNull('inactive')->where('parentid',$parent->id)->get(['id'])->pluck('id');

        return Article::on('mysql')->orderBy('publishday','DESC')->whereNull('inactive')->whereIn('categoryid',$categories)
            ->where('publishday',date('Y-m-d'))->get(['id','categoryid','title','thumbURL','summary','author','publishday']);
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

        $related = Article::query();

        $keywords = explode(';',$article->keywords);

        $related->orderBy('publishdate','DESC')->where('keywords', 'LIKE', '%'.$keywords[0].'%');

        foreach(array_slice($keywords,1,count($keywords) - 1 ) as $keyword){

            $related->orWhere('keywords', 'LIKE', '%'.$keyword.'%');
        }

        return $related->offset($offset)->limit($size)->get(['id','categoryid','title','thumbURL','summary','author','publishday'])
            ->reject(function ($item) use ($id) {
                return $item->id == $id;
            });
    }

    public function renderInAds($story,$collection,$count = 3)
    {
        //dump($collection->nth(1));
        //return;

        $adbegin ='<p class="card-text"> <a href="';
        $middle = '"> SEE ALSO: ';
        $adend = ' </a>  </p>';
        $size = $collection->count();

        $story = explode('</p>',$story);
        $x = 0;
        $result ='';
        foreach($story as $key => $value)
        {
            $result .= $value;
            if($x % $count == 0){

                if($key < $size)
                {
                    $article = $collection->get($key);
                    $url = url(Str::slug($this->getCategory($article->categoryid)->name,'-').'/'.$article->id.'/'.Str::slug($article->title,'-'));
                    $result .= $adbegin.$url.$middle.$article->title.$adend;
                }

            }
            $x++;
        }
        return str_replace('/images',env('IMAGECDN').'/images',$result);
    }

    public function getMostRead($size=4)
    {
        $params=[
            'key' => "ae48488c6ef1ea95354d3ffb5c496ca8",
            'entities' => [
                'articles' => [
                    'entity' => 'articles',
                    'details' => ['pageviews', 'readability', 'count_pub']
                ]
            ],
            'options' => [
                'period' => [
                    'name' => 'hour'
                ],
                'per_page' => 2000
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
        $objbody = json_decode($body);

        $sports = [];


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
}
