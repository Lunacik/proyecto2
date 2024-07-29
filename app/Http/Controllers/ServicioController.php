<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Servicio;
use Exception;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    private static $CODIGO_COUNTER=8;


    public function index()
    {
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        $servicios = Servicio::all();

        return view('servicios.index', ['servicios' => $servicios ?? [],
        'contador'=>$contador]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return redirect('/servicios');
    }


    public function update($codigo, Request $request)
    {
        $servicio = Servicio::findOrFail($codigo);
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->update();

        return redirect('/servicios');
    }

    public function delete($codigo)
    {
        try {
            $servicio = Servicio::findOrFail($codigo);
            $servicio->delete();

            return redirect('/servicios');
        } catch (Exception $e) {
            return redirect('/servicios')->with('servicio-delete','No se puede eliminar, consulte con el administrador');
        }
    }
}
