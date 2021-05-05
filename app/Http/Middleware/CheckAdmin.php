<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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

        $guards = empty($guards) ? [null] : $guards;


        foreach ($guards as $guard) {
            if (\Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        

        return  response()->json(['gards'=>$guards ]);
    }
}
