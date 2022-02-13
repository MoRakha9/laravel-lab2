<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $birth = auth()->user()->birth;
        $birth = date("Y-m-d");
        if($birth < '2007-01-01'){
            return $next($request);
        }
        else{
            return redirect()->route('home');
        }    }
}
