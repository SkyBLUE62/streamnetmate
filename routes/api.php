<?php

use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\FavoritesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     if (Auth::check()) {
//         $user = Auth::user();
//         return response()->json($user);
//     } else {
//         return response()->json(['message' => 'User not authenticated.'], 401);
//     }
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favorites/create/{idChaine}', [FavoritesController::class, 'create']);
    Route::get('/favorites/delete/{idChaine}', [FavoritesController::class, 'delete']);
});

Route::get('/dashboard', [DashboardController::class, 'index']);
