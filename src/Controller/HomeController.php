<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Plg\Database as DB;
class HomeController
{
    public function index(Request $request) 
    {

    	var_dump(DB::table('users')->where('id',16537)->get()->toarray());
    	exit;
        return new Response('Nope, this is not a leap year.'.getenv('APP_DEBUG'));
    } 
    public function home(Request $request) 
    {

        return new Response('this is home action');
    } 
}

