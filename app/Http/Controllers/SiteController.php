<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Portfolio;

class SiteController extends Controller
{
    public function home()
    {
        $homePage   = Page::where('id', 1)->withActiveSections()->firstOrFail();
        $portfolios = Portfolio::where('status', 'active')->orderBy('id','desc')->get();
        $services   = Service::where('status', 'active')->orderBy('id','desc')->get();
        return view('site.home', compact('homePage','portfolios','services'));
    }

    public function terms_conditions()
    {
        $termsPage = Page::where('id', 2)->withActiveSections()->firstOrFail();

        return view('site.terms_conditions', compact('termsPage'));
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
