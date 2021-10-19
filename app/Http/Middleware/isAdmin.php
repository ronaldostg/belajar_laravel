<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
         // auth()->guest() = ketika belum login

        // auth()->check() = ketika sudah login
        
        // if(auth()->guest() || auth()->user()->username !== 'ronaldostg'){
        //     abort(403);
        // }
        if(!auth()->guest() || auth()->user()->is_admin){
            abort(403);
        }
        
        return $next($request);
    }
}
