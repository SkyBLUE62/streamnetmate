<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function logout(){
        $user = Auth::user();
        $user->tokens()->delete();
        $cookie = Cookie::forget('api-token');

        Auth::logout();
        return redirect('/home')->withCookie($cookie);
    }
}
