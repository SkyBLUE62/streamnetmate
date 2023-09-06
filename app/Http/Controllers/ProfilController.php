<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Chaine;
use App\Models\Favorite;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = null;
        $orders = null;
        $abonnement = null;
        $jourRestant = null;
        if (Abonnement::where('idUser','=',$user->id)->exists()) {
            $abonnement = Abonnement::where('idUser','=',$user->id)->first();
            $date = Carbon::now();
            $jourRestant = $date->diff($abonnement['dateFin']);
        }
        if (Order::where('idUser','=',$user->id)->exists()) {
            $orders = Order::where('idUser','=',$user->id)->orderBy('created_at','DESC')->get();
        }
        if (Favorite::where('idUser', '=', $user->id)->exists()) {
            $favorites = Favorite::where('idUser', '=', $user->id)->get();
        }
        $chaines = Chaine::all();

        return view('client.profil')->with([
            'chaines' => $chaines,
            'favorites' => $favorites,
            'orders' => $orders,
            'abonnement' => $abonnement,
            'jourRestant' => $jourRestant,
        ]);
    }
}
