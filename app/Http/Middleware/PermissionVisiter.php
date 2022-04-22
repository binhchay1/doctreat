<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionVisiter
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
        if (Auth::check() == true && Auth::user()->role === 4 && Auth::user()->email_verified_at !== null) {
            return $next($request);
        }

        if (Auth::check() == true && Auth::user()->role === 4 && Auth::user()->email_verified_at === null) {
            return redirect('/email/verify');
        }

        if (Auth::check() == false or Auth::user()->role === 4) {
            return $next($request);
        } else {
            return redirect('/error/permission');
        }
    }
}
