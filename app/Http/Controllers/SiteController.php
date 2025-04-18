<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function home() 
   {
    return view('site.home');
   }

   public function about() 
   {
     return view('site.about');
   }

   public function contact() 
   {
     return view('site.contact');
   }
   
   public function portfolio() 
   {
     return view('site.portfolio');
   }

}
