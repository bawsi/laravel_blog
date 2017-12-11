<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Make sure admin user id is always 1
        if (auth()->user()->role->id !== 1) {
            return redirect()->route('manage.dashboard')->withErrors(['You are not authorized to access this page!']);
        }

        return $next($request);
    }
}
