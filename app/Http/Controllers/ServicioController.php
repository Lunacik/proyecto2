<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct() {
        
    }

    public function index(){
        $servicios=Servicio::all();
        
        return view('servicios.index',['servicios'=>$servicios??[]]);
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        $servicio=new Servicio();
        $servicio->nombre=$request->nombre;
        $servicio->descripcion=$request->descripcion;
        $servicio->save();

        return redirect('/servicios');
    }

   
    public function update($codigo,Request $request){
        $servicio=Servicio::findOrFail($codigo);
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        $servicio->nombre=$request->nombre;
        $servicio->descripcion=$request->descripcion;
        $servicio->update();

        return redirect('/servicios');
    } 
}
