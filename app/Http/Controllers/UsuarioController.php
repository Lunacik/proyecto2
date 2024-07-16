<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = Usuario::all();
        
        return view('users.index', ['users' => $users]);
    }

    public function edit($ci)
    {
        $user = Usuario::findOrFail($ci);

        $roles = ['1' => 'Abogado', '2' => 'Cliente', '3' => 'Administrador'];
        return view('users.edit', ['user' => $user,'roles'=>$roles]);
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
        
        $usuario = new Usuario();

        $usuario->ci = $request->ci;
        $usuario->nombre = $request->nombre;
        $usuario->fnacimiento = $request->fnacimiento;
        $usuario->celectronico =  $request->celectronico;
        $usuario->tipo = $request->tipo;
        $usuario->sexo = $request->sexo;
        $usuario->password = bcrypt($request->password);

        $usuario->save();

        $user=new User();
        $user->email=$request->celectronico;
        $user->password=$request->password;
        $user->usuario_ci=$request->ci;
        
        $user->save();

        return redirect('/users');
    }

    public function update($ci,Request $request)
    {
        $request->validate(
            [
                'ci' => 'required',
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                'tipo' => 'required',
                'sexo' => 'required',
            ]
        );
        
        $usuario = Usuario::findOrFail($ci);

        $usuario->ci = $request->ci;
        $usuario->nombre = $request->nombre;
        $usuario->fnacimiento = $request->fnacimiento;
        $usuario->celectronico =  $request->celectronico;
        $usuario->sexo = $request->sexo;
        $usuario->tipo = $request->tipo;

        $usuario->update();

        $user=$usuario->user;
        $user->email=$request->celectronico;
        $user->update();

        return redirect('/users');
    }
}
