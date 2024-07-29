<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Counter;
use App\Models\User;
use App\Models\Usuario;
use App\Models\UsuarioCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class UsuarioController extends Controller
{
    private static $CODIGO_COUNTER=7;
    private static $CODIGO_COUNTER_CITA=3;

    public function index()
    {
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        $users = Usuario::all();
        
        return view('users.index', ['users' => $users,'contador'=>$contador]);
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
                'sexo' => 'required|max:1',
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
        $user->password=bcrypt($request->password);
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
                'sexo' => 'required|max:1',
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

    public function createCite(){

        Counter::plusCounter(static::$CODIGO_COUNTER_CITA);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER_CITA);

        $userActive=Auth::user()->usuario;
        $usuario=UsuarioCita::where('ciusuario',$userActive->ci)->get();

        if($userActive->ci==Usuario::$ADMINISTRADOR){
            $usuario=UsuarioCita::all();
        }
        
        $citas=Cita::all();

        
        return view('usuariocitas.index',['usuario'=>$usuario,'citas'=>$citas,'contador'=>$contador]);
    }

    public function storeCite(Request $request){

        
        $usuario=Auth::user()->usuario_ci;
        $request->validate([
            'numerocita'=>'required',
            'fecha'=>'required'
        ]);
        
        $usuario_cita=new UsuarioCita();
        $usuario_cita->ciusuario=$usuario;
        $usuario_cita->numerocita=$request->numerocita;
        $usuario_cita->fecha=$request->fecha;
        $usuario_cita->save();

        return redirect('/citas/usuario');

    }

    public function disabled($ci){
        $user=Usuario::findOrFail($ci);

        if($user->estado==2){
            $user->estado=1;
        }else{
            $user->estado=2;
        }
        $user->update();
        return redirect('/users');
    }
}
