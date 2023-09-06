<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\FavoritesController;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\api\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth', 'abonnement.control')->name('profil');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/chaines', [StreamController::class, 'index'])->name('allChaines');

Route::get('chaines/{slug}', [StreamController::class, 'show'])->where('slug', '[a-z0-9-]+')->middleware(['abonnement.control', 'chaine.control'])->name('chaine-direct');

Route::get('/favorites', [FavoritesController::class, 'index'])->middleware('favorites.control')->name('favorites');

Route::get('/paiement', [StripeController::class, 'index'])->middleware('auth')->name('paiement');

Route::get('/success/{token}', [StripeController::class, 'success'])->middleware(['auth', 'paiement.control'])->name('paiement-success');

Route::get('/error/{token}', [StripeController::class, 'error'])->middleware(['auth', 'paiement.control'])->name('paiement-error');

Route::get('/order/{idOrder}', [OrdersController::class, 'show'])->middleware(['invoice.control'])->name('order-detail');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::group(['middleware' => 'admin.control'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/ajouter-chaine', [AdminController::class, 'addChaine'])->name('ajouter-chaine-get');
    Route::post('/ajouter-chaine', [AdminController::class, 'ajouter_chaine'])->name('ajouter-chaine-post');
    Route::get('/chaines-admin', [AdminController::class, 'chaines'])->name('chaines-admin-get');
    Route::get('/delete-chaine/{id}', [AdminController::class, 'delete_chaine'])->name('delete-chaine');
    Route::get('/edit-chaine/{id}', [AdminController::class, 'edit_chaine'])->name('edit-chaine');
    Route::post('/update-chaine/{id}', [AdminController::class, 'update_chaine'])->name('update-chaine');

    Route::get('/links', [AdminController::class, 'links'])->name('links');
    Route::post('/insert-link', [AdminController::class, 'insert_link'])->name('insert_link');
    Route::get('/ajouter-link', [AdminController::class, 'add_link'])->name('add-link');

    Route::get('/delete-link/{id}', [AdminController::class, 'delete_link'])->name('delete-link');
    Route::get('/edit-link/{id}', [AdminController::class, 'edit_link'])->name('edit-link');
    Route::post('/update-link/{id}', [AdminController::class, 'update_link'])->name('update-link');

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/edit-user/{id}', [AdminController::class, 'edit_user'])->name('edit-user');
    Route::post('/update-user/{id}', [AdminController::class, 'update_user'])->name('update-user');
    Route::get('/delete-user/{id}', [AdminController::class, 'delete_user'])->name('delete-user');
});
