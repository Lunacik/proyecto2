<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Counter;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    private static $CODIGO_COUNTER=6;
    public function index()
    {
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        $abogados = Abogado::all();
        
        return view('abogados.index', ['abogados' => $abogados,'contador'=>$contador]);
    }

    public function edit($ci)
    {
        $abogado = Abogado::findOrFail($ci);
        return view('abogados.edit', ['abogado' => $abogado]);
    }

    public function create()
    {
        return view('abogados.create');
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
                'codcol'=>'required',
                'especialidad' => 'required',
            ]
        );


        $usuario = new Usuario();
        $usuario->ci=$request->ci;
        $usuario->nombre = $request->nombre;
        $usuario->fnacimiento = $request->fnacimiento;
        $usuario->celectronico =  $request->celectronico;
        $usuario->tipo = 1;
        $usuario->sexo = $request->sexo;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $abogado = new Abogado();
        $abogado->ci = $usuario->ci;
        $abogado->codcol = $request->codcol;
        $abogado->especialidad = $request->especialidad;
        $abogado->save();

        $user=new User();
        $user->email=$request->celectronico;
        $user->password=bcrypt($request->password);
        $user->usuario_ci=$request->ci;
        $user->save();

        return redirect('/abogados');
    }

    public function update($ci, Request $request)
    {
        $request->validate(
            [
                'ci'=>'required',
                'nombre' => 'required',
                'fnacimiento' => 'required',
                'celectronico' => 'required',
                
                'sexo' => 'required|max:1',
                'codcol'=>'required',
                'especialidad' => 'required',
            ]
        );

        $abogado = Abogado::findOrFail($ci);
        
        $user=User::where('usuario_ci',$ci)->first();

        $user->email=$request->celectronico;
        $user->save();

        $abogado->codcol = $request->codcol;
        $abogado->especialidad = $request->especialidad;
        $abogado->update();

        $usuario=$abogado->usuario;

        $usuario->nombre = $request->nombre;
        $usuario->fnacimiento = $request->fnacimiento;
        $usuario->celectronico =  $request->celectronico;
        $usuario->sexo = $request->sexo;
        $usuario->update();
        
        
        return redirect('/abogados');
    }

    
}
