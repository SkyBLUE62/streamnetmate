<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Chaine;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AbonnementChaineControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $urlSlug = $request->route('slug');
        if (Chaine::where('slug', '=', $urlSlug)->exists()) {
            $chaine = Chaine::where('slug', '=', $urlSlug)->first();
            if ($chaine['type_abonnement'] == Chaine::TYPE_ABONNEMENT_FREE) {
                return $next($request);
            } else {
                if (Auth::check()) {
                    $user = Auth::user();

                    if ($chaine['type_abonnement'] == Chaine::TYPE_ABONNEMENT_VIP && $user->status == Chaine::TYPE_ABONNEMENT_VIP) {
                        return $next($request);
                    } else {
                        return redirect()->route('profil')->with([
                            'alert' => 'Vous devez être abonné pour avoir accès à cette chaîne.'
                        ]);
                    }
                } else {
                    return redirect()->route('login');
                }
            }
        }
    }
}
