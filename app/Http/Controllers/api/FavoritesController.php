<?php

namespace App\Http\Controllers\api;

use App\Models\Chaine;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        $favorites = [];
        return response()->json($favorites, 200);
    }

    public function create($idChaine)
    {
        if (Auth::check()) {
            if ($chaine = Chaine::find($idChaine)) {
                if (!Favorite::where('idChaine', '=', $chaine['id'])->where('idUser', '=', Auth::user()->id)->exists()) {

                    $favorite = new Favorite();
                    $favorite->chaines = $chaine['chaine'];
                    $favorite->idChaine = $chaine['id'];
                    $favorite->idUser = Auth::user()->id;
                    $favorite->save();
                    return response()->json(['The channel has been added as a favourite'], '201');
                } else {
                    return response()->json(['The favourie already exists'], '409');
                }
            } else {
                return response()->json(['The channel cannot be found'], '404');
            }
        } else {
            return response()->json(['Not Authorized'], '401');
        }
    }

    public function delete($idChaine)
    {
        if (Auth::check()) {
            if ($chaine = Chaine::find($idChaine)) {
                if (Favorite::where('idChaine', '=', $chaine['id'])->where('idUser', '=', Auth::user()->id)->exists()) {
                    $favorite = Favorite::where('idChaine', '=', $chaine['id'])->where('idUser', '=', Auth::user()->id)->first();
                    $favorite->delete();
                    return response()->json(['The favourie has been successfully deleted'], '200');
                } else {
                    return response()->json(['There is no such thing as a favourite '], '404');
                }
            } else {
                return response()->json(['The channel cannot be found'], '404');
            }
        } else {
            return response()->json(['Not Authorized'], '401');
        }
    }
}
