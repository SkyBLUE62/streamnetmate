<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class PaiementControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (PersonalAccessToken::where('tokenable_id', '=', $user->id)->where('name', '=', 'paiement-success')->exists()) {
            return $next($request);
        } elseif (PersonalAccessToken::where('tokenable_id', '=', $user->id)->where('name', '=', 'paiement-error')->exists()) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
