<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     // dd($guard);
            //     return redirect(RouteServiceProvider::HOME);
            // }
            // dd($guard);

            if (Auth::guard('web')->check()) {
                return redirect('user/home');
            } else if ($guard == 'admin' && Auth::guard('admin')->check()) {
                return redirect('admin/home');
            } else if ($guard == "null") {
                return redirect('user/login');
            }
        }

        return $next($request);
    }
}
