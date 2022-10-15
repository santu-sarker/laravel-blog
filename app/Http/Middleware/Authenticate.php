<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // return route('uk.login');
            if ($request->is('user/*') || $request->is('user')) {
                if (Auth::guard('admin')->check()) {
                    return route('admin.home');
                } else {
                    return route('user.login');
                }

            } else if ($request->is('admin/*') || $request->is('admin')) {
                if (Auth::guard('web')->check()) {
                    return route('user.home');
                } else {
                    return route('admin.login');
                }
            }
        }
    }
}
