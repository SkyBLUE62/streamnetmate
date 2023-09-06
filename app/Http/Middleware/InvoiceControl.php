<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InvoiceControl
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
            $idOrder = $request->route('idOrder');
            if (Order::where('idOrder', '=', $idOrder)->exists()) {
                $order = Order::where('idOrder', '=', $idOrder)->first();
                if ($order['idUser'] == $user->id) {
                    return $next($request);
                } else {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->route('404');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
