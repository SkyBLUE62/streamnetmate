<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Order;
use App\Models\Chaine;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $isAdmin = $user->isAdmin(); // Utilisez la propriété $isAdmin au lieu d'appeler une fonction
        if ($isAdmin) {

            $dataSend = [
                'orders' => Order::count() ?? [],
                'abonnements' => Abonnement::count() ?? [],
                'users' => User::count() ?? [],
                'chaines' => Chaine::count() ?? [],
            ];
        } else {
            $dataSend = [];
        }

        return response()->json($dataSend);
    }
}
