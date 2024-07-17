<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){

        $cantidadAbogados=Abogado::all()->count();
        $cantidadClientes=Cliente::all()->count();
        

        return view('dashboard.index',['abogados'=>$cantidadAbogados,'clientes'=>$cantidadClientes]);
    }

    public function getCantidadServiciosDistintos(){
        $servicios=DB::table('servicio')
            ->join('caso_servicio','servicio.codigo','=','caso_servicio.codigoservicio')
            ->selectRaw('nombre,count(*) as cantidad')
            ->groupBy('nombre')
            ->get();
        
        return response()->json($servicios,200);
    }

    public function getNowYearCantidadCitas(){
        $year=now()->year;
        
        $citas=DB::table('usuario_cita')
            ->selectRaw("EXTRACT(MONTH from TO_DATE(fecha,'YYYY-MM-DD')) as mes, count(*) as cantidad")
            ->whereRaw("EXTRACT(YEAR from TO_DATE(fecha,'YYYY-MM-DD'))=".$year)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        return response()->json($citas,200);
    }
}
