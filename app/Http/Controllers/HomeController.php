<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Models\Chaine;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class HomeController extends Controller
{
    public function index()
    {


        $links = Link::all();
        $chaines = Chaine::where('popular','=','1')->get();
        $lastAddChaines = Chaine::latest('created_at')->take(3)->get();
        $favorites = null;
        $user = Auth::user();
        if ($user) {
            if (Favorite::where('idUser','=',$user->id)->exists()) {
                $favorites = Favorite::where('idUser','=',$user->id)->get();
            }
        }

        return view('client.home')->with([
            'links' => $links,
            'chaines' => $chaines,
            'lastAddChaines' => $lastAddChaines,
            'favorites' => $favorites,
        ]);
    }
}
