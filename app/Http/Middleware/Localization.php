<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier la langue préférée du navigateur de l'utilisateur
        $preferredLanguage = $request->getPreferredLanguage(['fr', 'en']);

        // Définir la langue en fonction de la langue préférée du navigateur ou utiliser la langue par défaut
        $locale = $preferredLanguage === 'fr' ? 'fr' : config('app.locale');
        App::setLocale($locale);

        return $next($request);
    }
}
