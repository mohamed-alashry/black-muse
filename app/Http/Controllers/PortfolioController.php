<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioPage = Page::where('id', 2)->withActiveItems()->firstOrFail();

        return view('site.portfolio.index', compact('portfolioPage'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('site.portfolio.show', compact('portfolio'));
    }
}
