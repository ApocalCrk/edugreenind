<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if(Auth::user()->level == 'Admin'){
            return $next($request);
        }elseif(Auth::user()->level == 'Publishing'){
            return redirect('/publishing');
        }
        return redirect('/');
    }
}
