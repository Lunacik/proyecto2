<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Counter;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    private static $CODIGO_COUNTER=4;

    public function index()
    {
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        $citas = Cita::all();

        return view('citas.index', ['citas' => $citas,'contador'=>$contador]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|max:50'
        ]);

        $cita = new Cita();
        $cita->texto = $request->texto;
        $cita->save();

        return redirect('/citas');
    }


    public function update($numero, Request $request)
    {
        $cita = Cita::findOrFail($numero);
        $request->validate([
            'texto' => 'required'
        ]);

        $cita->texto = $request->texto;
        $cita->update();

        return redirect('/citas');
    }
    public function delete($codigo)
    {
        try {
            $servicio = Cita::findOrFail($codigo);
            $servicio->delete();

            return redirect('/citas');
        } catch (Exception $e) {
            return redirect('/citas')->with('cita-delete','No se puede eliminar, consulte con el administrador');
        }
    }
}
