<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionAdminAndEmployee
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
        if (Auth::check()) {
            if (Auth::user()->role == \App\Enums\Role::ADMIN or Auth::user()->role == \App\Enums\Role::EMPLOYEE) {
                return $next($request);
            } else {
                return redirect('/error/permission');
            }
        } else {
            dd(Auth::user()->role);
            return redirect('/error/permission');
        }
    }
}
