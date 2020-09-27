<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsEditeur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == "editeur"){
            return $next($request);   
        }
        else if(Auth::user()->role != "editeur" && Auth::user()->role == "admin")
            return $next($request);   

        return redirect("/");
    }
}
