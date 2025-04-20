<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Portfolio;

class SiteController extends Controller
{
    public function home()
    {
        $homePage = Page::where('id', 1)->withActiveSections()->firstOrFail();

        return view('site.home', compact('homePage'));
    }

    public function about()
    {
        $aboutPage = Page::where('id', 3)->withActiveSections()->firstOrFail();

        return view('site.about', compact('aboutPage'));
    }

    public function contact()
    {
        $contactPage = Page::where('id', 4)->withActiveSections()->firstOrFail();

        return view('site.contact', compact('contactPage'));
    }


}
