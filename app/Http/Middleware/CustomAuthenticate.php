<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectAfterLogin
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::guard('web')->check()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return $response;
    }
}
