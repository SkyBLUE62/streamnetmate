<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Chaine;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('idUser', '=', $user->id)->get();
        $chaines = Chaine::all();
        $links = Link::all();
        return view('client.favorites')->with([
            'chaines' => $chaines,
            'favorites' => $favorites,
            'links' => $links
        ]);
    }
}
