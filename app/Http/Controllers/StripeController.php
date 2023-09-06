<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Abonnement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class StripeController extends Controller
{
    public function index()
    {
        Stripe::setApiKey(env('STRIPE_API_KEY'));
        header('Content-Type: application/json');
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 399,
                    'product_data' => [
                        'name' => 'Abonnement 31 jours VIP',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paiement-success', $this->generateToken('paiement-success', 'paiement_success')),
            'cancel_url' => route('paiement-error', $this->generateToken('paiement-error', 'paiement_error')),
        ]);
        header("HTTP/1.1 303 See Other");
        return redirect($checkout_session->url);
    }

    private function generateToken($name, $abilities)
    {
        $token = Str::random(40);
        $user = Auth()->user();
        $user->tokens()->create([
            'name' => (string)$name,
            'token' => hash('sha256', $token),
            'abilities' => [(string)$abilities],
        ]);
        return $token;
    }

    public function success($token)
    {
        $user = Auth::user();
        $order = new Order();
        $abonnement = new Abonnement();
        $date = Carbon::now()->addDays(31);
        $dateFormatted = $date->format('Y-m-d H:i:s');

        $order->idOrder = Str::uuid();
        $order->idUser = $user->id;
        $order->prix = '3.99';
        $order->save();

        $orders = Order::latest('created_at')->where('idUser', '=', $user->id)->get();

        $abonnement->idUser = $user->id;
        $abonnement->dateFin = $dateFormatted;
        $abonnement->save();

        $client = User::find($user->id);
        $client->status = 'VIP';
        $client->save();

        PersonalAccessToken::where('tokenable_id', '=', $user->id)->where('name', '=', 'paiement-success')->where('token', '=', $token)->delete();

        return view('client.stripe.success')->with([
            'orders' => $orders,
        ]);
    }

    public function error($token)
    {
        $user = Auth::user();
        PersonalAccessToken::where('tokenable_id', '=', $user->id)->where('name', '=', 'paiement-error')->where('token', '=', $token)->delete();
        return view('client.stripe.error');
    }
}
