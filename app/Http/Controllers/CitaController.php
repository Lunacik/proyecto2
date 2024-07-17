<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function __construct() {
        
    }

    public function index(){
        $citas=Cita::all();
        
        return view('citas.index',['citas'=>$citas]);
    }

    public function store(Request $request){
        $request->validate([
            'texto'=>'required|max:50'
        ]);

        $cita=new Cita();
        $cita->texto=$request->texto;
        $cita->save();

        return redirect('/citas');
    }

   
    public function update($numero,Request $request){
        $cita=Cita::findOrFail($numero);
        $request->validate([
            'texto'=>'required'
        ]);

        $cita->texto=$request->texto;
        $cita->update();

        return redirect('/citas');
    } 
    public function delete($codigo){
        $servicio=Cita::findOrFail($codigo);
        $servicio->delete();

        return redirect('/citas');
    }
}
