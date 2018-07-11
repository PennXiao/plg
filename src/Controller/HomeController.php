<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request) 
    {

        return new Response('Nope, this is not a leap year.');
    } 
    public function home(Request $request) 
    {

        return new Response('this is home action');
    } 
}
