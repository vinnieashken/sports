<?php


namespace App\Utils;


use Illuminate\Support\Facades\Cookie;

class AuthSync
{
    public $expiry_period;
    public function __construct()
    {
        $this->expiry_period = 60*24*30; //30 days;
    }

    public function ShareUser($user)
    {
        $path = null;
        $domain = "standardmedia.co.ke";
        $secure = true;
        $httponly =  true;
        Cookie::queue('SG_share_UD',json_encode($user), $this->expiry_period,$path,$domain,$secure,$httponly);
    }

    public function RetrieveUser()
    {
        $user = Cookie::get('SG_share_UD');
        return is_null($user ? null: json_decode($user));
    }

    public function forgetUser()
    {
        if(Cookie::has('SG_share_UD'))
            Cookie::unqueue('SG_share_UD');
    }


}
