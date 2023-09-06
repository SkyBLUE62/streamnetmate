<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FavoritesControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            if (Favorite::where('idUser', '=', $user->id)->exists()) {
                return $next($request);
            } else {
                return redirect()->route('allChaines')->with([
                    'alert' => 'Vous n\'avez pas encore de chaine en favorie.'
                ]);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
