<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleFromHeader
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('X-localization')) {
            $locale = $request->header('X-localization');
            App::setLocale($locale);
        }

        return $next($request);
    }
}
