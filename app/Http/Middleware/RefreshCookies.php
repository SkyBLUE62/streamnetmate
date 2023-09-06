<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class RefreshCookies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            if (!$request->hasCookie('api-token')) {
                $token = PersonalAccessToken::where('tokenable_id', Auth::user()->id)
                    ->where('name', 'api-token')
                    ->first();
                $cookie = Cookie::make('api-token', $token['token'], 60, null, null, false, false); // Paramètre `httpOnly` défini sur `false`
                $response = $next($request);
                $response->headers->setCookie($cookie);
                return $response;
            }
        }
        return $next($request);
    }
}
