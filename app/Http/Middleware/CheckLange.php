<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    
          $lng = $request->lang?$request->lang: 'ar';
          app()->setlocale($lng);
        return $next($request);
    }
}
