<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Chaine;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StreamController extends Controller
{
    public function index()
    {
        $chaines =  Chaine::all();

        $mostChaines = Chaine::where('popular', '=', '1')->limit('8')->get();
        $links = Link::all();
        $user = Auth::user();
        $favorites = null;
        if ($user) {
            if (Favorite::where('idUser','=',$user->id)->exists()) {
                $favorites = Favorite::where('idUser','=',$user->id)->get();
            }
        }

        return view('client.chaines')->with([
            'chaines' => $chaines,
            'mostChaines' => $mostChaines,
            'favorites' => $favorites,
            'links' => $links,
        ]);
    }

    public function show($slug)
    {
        $user = Auth::user();
        $chaine =  Chaine::where('slug', '=', $slug)->firstOrFail();
        $favorites = null;
        if ($user) {
            if (Favorite::where('idUser', '=', $user->id)->where('idChaine', '=', $chaine['id'])->exists()) {
                $favorites = Favorite::where('idUser', '=', $user->id)->where('idChaine', '=', $chaine['id'])->first();
            }
        }
        $link = Link::where('idChaine', '=', $chaine['id'])->get();
        return view('client.chaine-direct')->with([
            'chaine' => $chaine,
            'link' => $link,
            'favorites' => $favorites,
        ]);
    }
}
