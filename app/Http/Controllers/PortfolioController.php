<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show($id)
    {
        $portfolio = Portfolio::query()->withActiveItems()->findOrFail($id);

        return view('site.portfolio.show', compact('portfolio'));
    }
}
