<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        if (auth()->check()) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard.admin');
            } elseif ($user->hasRole('user')) {
                if ($user->is_banned) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Akun Anda telah dibanned. Silakan hubungi admin untuk informasi lebih lanjut.');
                } else {
                    return redirect()->route('landing.page')->withCookie(cookie('remember_web', true, 3));
                }
            }
        }
        return $next($request);
    }
}
