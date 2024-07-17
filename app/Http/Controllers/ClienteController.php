<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function edit($ci)
    {
        $cliente = Cliente::findOrFail($ci);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function create()
    {
        return view('clientes.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'ci'=>'required',
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                'sexo' => 'required|max:1',
                'password' => 'required',
                'nidentificacion'=>'required',
            ]
        );

        $usuario = new Usuario();
        $usuario->ci=$request->ci;
        $usuario->nombre = $request->nombre;
        $usuario->fnacimiento = $request->fnacimiento;
        $usuario->celectronico =  $request->celectronico;
        $usuario->tipo = 2;
        $usuario->sexo = $request->sexo;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $cliente = new Cliente();
        $cliente->ci = $usuario->ci;
        $cliente->nidentificacion = $request->nidentificacion;
        $cliente->save();

        $user=new User();
        $user->usuario_ci=$usuario->ci;
        $user->email=$usuario->celectronico;
        $user->password=bcrypt($request->password);
        $user->save();


        return redirect('/clientes');
    }

    public function update($ci, Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                'sexo' => 'required|max:1',
                'nidentificacion'=> 'required',
            ]
        );

        $cliente = Cliente::findOrFail($ci);

        $cliente->nidentificacion = $request->nidentificacion;
        $cliente->update();

        $user=$cliente->usuario;

        $user->nombre = $request->nombre;
        $user->fnacimiento = $request->fnacimiento;
        $user->celectronico =  $request->celectronico;
        $user->sexo = $request->sexo;
        $user->update();
        
        return redirect('/clientes');
    }
}
