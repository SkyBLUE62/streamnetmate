<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AbonnementControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (Abonnement::where('dateFin', '<', Carbon::now()->toDateString())->where('idUser', '=', $user->id)->exists()) {
                // Expiré
                Abonnement::where('idUser', '=', $user->id)->first();
                $client = User::find($user->id);
                $client->status = 'VIP';
                $client->save();
                return $next($request);
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
