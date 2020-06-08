<?php

namespace App\Http\Controllers;

use App\User;
use App\Utils\Articles;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    //

    private $api;
    public function __construct()
    {
        $this->api = 'https://vas.standardmedia.co.ke/api/';
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;
        $url = $request->url;

        $user =  new User();

        $params = ["body"=>json_encode(['username'=> $username, 'password'=>$password,"app_id"=> 5,"app_secret"=>"7Gv2qYEFYQDErPCk"])];

        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ],'verify'=> base_path('/cacert.pem'),'http_errors'=>false]);
        try {

            $response = $client->request('POST', $this->api . 'auth', $params);

        }catch (Exception $e)
        {

        }

        $headers = $response->getHeaders();
        $body = $response->getBody()->getContents();
        $objbody = json_decode($body);

        //dump($objbody);

        //return ;

        if(property_exists($objbody ,'message'))
        {
            return redirect($url);
        }

        $user->id = $objbody->id;
        $user->email = $objbody->email;
        $user->name = $objbody->name;

        $existing = $user->find($objbody->id);

        if(is_null($existing))
            $user->save();

        Auth::setUser($user);
        Auth::login($user);

        return redirect($url);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function getUser()
    {
        //return Auth::user() ?? 'not logged in';
    }

    public function getMostRead()
    {
        $articles = new Articles();

        dump($articles->getMostRead());


        return $articles->getLocalArticles($articles->getMostRead());
    }
}
