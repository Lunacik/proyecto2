<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }

    public function edit($ci)
    {
        $user = User::findOrFail($ci);

        return view('users.edit', ['user' => $user]);
    }
    
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'ci' => 'required',
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                'tipo' => 'required',
                'sexo' => 'required',
                'password' => 'required'
            ]
        );
        
        $user = new User();

        $user->ci = $request->ci;
        $user->nombre = $request->nombre;
        $user->fnacimiento = $request->fnacimiento;
        $user->celectronico =  $request->celectronico;
        $user->tipo = $request->tipo;
        $user->sexo = $request->sexo;
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('/users');
    }

    public function update($ci,Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                'tipo' => 'required',
                'sexo' => 'required',
            ]
        );
        
        $user = User::findOrFail($ci);

        $user->nombre = $request->nombre;
        $user->fnacimiento = $request->fnacimiento;
        $user->celectronico =  $request->celectronico;
        $user->tipo = $request->tipo;
        $user->sexo = $request->sexo;

        $user->update();
        return redirect('/users');
    }
}
