<?php


namespace App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CookieTool
{
    public $must_login, $must_pay,$story_no ;
    public function __construct()
    {
        //put this code just below the article, not at the footer
        $this->must_login =  15; // get api for this
        $this->must_pay = 20; // get api for this
        $this->expiry_period = 60*24*30; //30 days;
    }

    public function track()
    {
        $path = null;
        $domain = "standardmedia.co.ke";
        $secure = true;
        $httponly =  true;


        $this->story_no = Cookie::get('story_no');

        if(!is_numeric($this->story_no))
            $this->story_no = 0;

        $this->story_no++;
        //Cookie::queue('story_no',$this->story_no, $this->expiry_period );
        Cookie::queue('story_no',$this->story_no, $this->expiry_period,$path,$domain,$secure,$httponly);

        //print($this->story_no);
    }

    public function enforceLogin()
    {
        if(Auth::check())
            return false;

       //return $this->must_login > $this->story_no ? false : true ;


        $story_no_insider = Cookie::get('story_no_insider');
        $this->story_no = Cookie::get('story_no');

        if(!is_numeric($story_no_insider))
            $story_no_insider = 1;

        if(!is_numeric($this->story_no))
            $this->story_no = 1;



        $total = ( ( is_null($this->story_no) ? 0 : $this->story_no) + ( is_null($story_no_insider) ? 0 : $story_no_insider));

        //CookieTool::debug_to_console( 'total',$total);

        $result = $this->must_login > $total ? false : true;

        //CookieTool::debug_to_console( 'enforce',$res == true ? 'true': 'false');

        return $result ;
    }

    public function enforcePaywall()
    {
        if(!is_numeric($this->story_no))
            $this->story_no = 1;

       return $this->must_pay > $this->story_no ? false : true ;
    }

    public function isNearLast()
    {
        if(!is_numeric($this->story_no))
            $this->story_no = 1;

        return $this->story_no + 1 == $this->must_login ? true : false;
    }
}



//$this->must_pay > $this->story_no ? $this->show_page(): $this->confirm_pay();


