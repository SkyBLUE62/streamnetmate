<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Models\Order;
use App\Models\Chaine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $users = User::where('role', '=', 'client')->get();

        return view('admin.dashboard')->with([
            'orders' => $orders,
            'users' => $users,
        ]);
    }

    public function addChaine()
    {
        return view('admin.addChaine');
    }

    public function ajouter_chaine(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'langue' => 'required',
            'slug' => 'required',
            'popular' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_abonnement' => 'required',
        ]);

        $chaine = new Chaine();
        $chaine->chaine = $request->nom;
        $chaine->langue = $request->langue;
        $chaine->slug = Str::slug($request->nom);
        $chaine->type_abonnement = $request->type_abonnement;
        $chaine->popular = $request->popular;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('public/assets/client/images', $fileName);
            $chaine->image = 'storage/assets/client/images/' . $fileName;
        } else {
            $chaine->image = 'assets/client/images/default.png';
        }
        $chaine->save();
        return redirect()->route('ajouter-chaine-get');
    }

    public function chaines()
    {
        $chaine = null;
        if (Chaine::exists()) {
            $chaines = Chaine::all();
        }
        return view('admin.chaines')->with('chaines', $chaines);
    }

    public function delete_chaine($idChaine)
    {
        $chaine = Chaine::findOrFail($idChaine);
        $chaine->delete();
        return redirect()->route('chaines-admin-get');
    }

    public function edit_chaine($idChaine)
    {
        $chaine = Chaine::findOrFail($idChaine);
        return view('admin.edit-chaine')->with('chaine', $chaine);
    }

    public function update_chaine($idChaine, Request $request)
    {
        $chaine = Chaine::findOrFail($idChaine);
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'langue' => 'required',
            'slug' => 'required',
            'popular' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'type_abonnement' => 'required',
        ]);

        $chaine->chaine = $request->nom;
        $chaine->langue = $request->langue;
        $chaine->slug = Str::slug($request->nom);
        $chaine->type_abonnement = $request->type_abonnement;
        $chaine->popular = $request->popular;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('public/assets/client/images', $fileName);
            $chaine->image = 'storage/assets/client/images/' . $fileName;
        } else {
            $chaine->image = 'assets/client/images/default.png';
        }
        $chaine->save();
        return redirect()->route('edit-chaine', $idChaine)->with('alert', 'La chaine a bien été modifiée.');
    }

    public function links()
    {
        $links = null;
        $chaines = null;

        if (Chaine::exists()) {
            $chaines = Chaine::all();
        }
        if (Link::exists()) {
            $links = Link::all();
        }
        return view('admin.links')->with([
            'links' => $links,
            'chaines' => $chaines
        ]);
    }

    public function add_link(Request $request)
    {
        $chaines = null;
        if (Chaine::exists()) {
            $chaines = Chaine::all();
        }
        return view('admin.add-link')->with(['chaines' => $chaines]);
    }

    public function insert_link(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'chaine' => 'required',
        ]);

        $link = new Link();
        $link->url = $request->url;
        $link->idChaine = $request->chaine;
        $chaine = Chaine::findOrFail($request->chaine);
        $link->chaine = $chaine['chaine'];
        $link->save();

        return redirect()->route('links')->with('alert', 'Le link a bien été ajouté.');
    }

    public function delete_link($idLink)
    {
        $link = Link::findOrFail($idLink);
        $link->delete();
        return redirect()->route('links')->with('alert', 'Le link a bien été supprimé.');
    }

    public function edit_link($idLink)
    {
        $link = Link::findOrFail($idLink);
        $chaines = null;

        if (Chaine::exists()) {
            $chaines = Chaine::all();
        }
        return view('admin.edit-link')->with(['link' => $link, 'chaines' => $chaines]);
    }

    public function update_link($idLink, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'chaine' => 'required',
        ]);
        $link = Link::FindOrFail($idLink);
        $link->url = $request->url;
        $link->idChaine = $request->chaine;
        $chaine = Chaine::findOrFail($request->chaine);
        $link->chaine = $chaine['chaine'];
        $link->save();

        return redirect()->route('edit-link', $idLink)->with('alert', 'Le link a bien été modifiée.');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users')->with(['users' => $users]);
    }

    public function edit_user($idUser)
    {
        $user = User::findOrFail($idUser);
        return view('admin.edit-user')->with(['user' => $user]);
    }

    public function update_user($idUser, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        $user = User::findOrFail($idUser);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('edit-user', $idUser)->with('alert', 'Le role a été modifié.');
    }

    public function delete_user($idUser)
    {
        $user = User::findOrFail($idUser);
        // Invalidation du token d'authentification
        $user->tokens()->delete();
        $user->save();
        $user->delete();
        return redirect()->route('users')->with('alert', 'L\'utilisateur a été supprimé.');
    }
}
