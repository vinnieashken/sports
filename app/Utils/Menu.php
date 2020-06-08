<?php


namespace App\Utils;


use App\Models\Category;

class Menu
{
    public $top;
    public function __construct()
    {
        $this->top = ['football','rugby','athletics','basketball','boxing','tennis'];
    }
    public function getCategories()
    {
        $sports = Category::on('mysql')->where('site','main')->where('name','like','%sports%')->first();
        $categories = Category::on('mysql')->where('parentid',$sports->id)->whereNull('inactive')->get(['id','name','shortname']);
        $topmenu = Category::on('mysql')->where('parentid',$sports->id)->whereNull('inactive')->whereIn('name',$this->top)->get(['id','name','shortname']);
        $more = Category::on('mysql')->where('parentid',$sports->id)->whereNull('inactive')->whereNotIn('name',$this->top)->get(['id','name','shortname']);;


        $result = new \stdClass();
        $result->top = $topmenu;
        $result->more = $more;

        return $result;
    }
}
