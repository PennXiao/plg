<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
// use Plg\Request;
// use Plg\Database as DB;
use Plg\View;
class HomeController
{
    public function index(Request $request) 
    {
        return View::make('index',['title'=>'框架正常运行']);
    } 
}

