<?php

namespace App\Http\Middleware\Employe\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('employe')->check() || Auth::guard('employe')->user()->status == 0)
        {
            return redirect()->route('employe.show.login');
        }
        return $next($request);
    }
}
