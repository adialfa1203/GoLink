<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HandleMobileLoginError
{
    public function handle($request, Closure $next)
    {
        if (session('error_occurred')) {
            Auth::logout();
            return redirect('/login')->with('error', session('error_message'));
        }

        return $next($request);
    }
}
