<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    public function index(Request $request){
        if($request->input('search')) {
            //ricerca con where sul nome
            //$users = User::where('name', '=', $request->input('search'))->get();
            //ricerca con where like sul nome e sull'email
            $users = User::where('name', 'like', '%'.$request->input('search').'%')
            ->orWhere('email', 'like', '%'.$request->input('search').'%')
            ->get();
        }
        else {
            $users = User::get();
        }

        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function save(Request $request) {
        $user = new User; //crea un nuovo utente

        $user -> name = $request->input('name'); //prende i dati del nuovo utente dal form 
        $user -> email = $request->input('email'); //prende i dati del nuovo utente dal form
        $user -> password = 'password';
        $user -> city_id = $request->input('city_id', null);

        $user->save(); //salva i dati
        return redirect('/users'); //reindirizza alla pagina della lista utenti
    }

    public function update($id) {
        //modo meno efficiente
        //$user = User::where('id', '=', $id)->get()[0];
        //modo più efficiente
        $user = User::find($id);        
        
        if($user == null) {
            return view('error', [
                'link' => '/users',
                'error' => 'Utente inesistente'
            ]);
        }

        return view('users.update', compact('user'));
    }

    public function saveUpdate($id, Request $request) {
        $user = User::find($id);

        $user-> name = $request->input('name');
        $user -> email = $request->input('email', 'example@gmail.com');
        $user -> city_id = $request->input('city_id', null);

        $user->save();
        return redirect('/users');
    }

    public function delete($id) {
        $user = User::find($id);
        
        $user -> delete();

        return redirect('/users');
    }
}