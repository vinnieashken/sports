<?php


namespace App\Utils;
use Illuminate\Support\Facades\Cookie;

class CookieTool
{
    public function track()
    {
        $path = '/';
        $domain = "standardmedia.co.ke";
        $secure = true;
        $httponly =  true;

        //put this code just below the article, not at the footer
        $this->must_login =  5; // get api for this
        $this->must_pay = 20; // get api for this
        $this->expiry_period = 60*24*15; //15 days;

        $this->story_no = Cookie::get('story_no');
        $this->must_login > $this->story_no ? $this->show_page() : $this->confirm_login();
        $this->story_no++;
        //Cookie::queue('story_no',$this->story_no, $this->expiry_period );
        Cookie::queue('story_no',$this->story_no, $this->expiry_period,$path,$domain,$secure,$httponly);

        print($this->story_no);
    }
}



//$this->must_pay > $this->story_no ? $this->show_page(): $this->confirm_pay();


