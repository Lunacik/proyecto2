<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Caso;
use App\Models\CasoServicio;
use App\Models\Cliente;
use App\Models\Counter;
use App\Models\Documento;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasoController extends Controller
{
    private static $CODIGO_COUNTER=2;

    public function index(){
        
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        $user=Auth::user()->usuario;
        
        if($user->tipo==Usuario::$ABOGADO){
            $casos=Caso::where('ciabogado',$user->ci)->get();
            return view('casos.index',['casos'=>$casos,'contador'=>$contador]);
        }
        
        if($user->tipo==Usuario::$CLIENTE){
            $casos=Caso::where('codcliente',$user->ci)->get();
            return view('casos.index',['casos'=>$casos,'contador'=>$contador]);
        }
         
        $casos=Caso::all();

        return view('casos.index',['casos'=>$casos,'contador'=>$contador]);
    }
    public function create(){

        $user=Auth::user()->usuario;
        $abogados=[];
        if($user->tipo==Usuario::$ADMINISTRADOR){
            $abogados=Abogado::all();
        }
        

        $clientes=Cliente::all();

        $servicios=Servicio::all();

        return view('casos.create',['clientes'=>$clientes,'abogados'=>$abogados,'servicios'=>$servicios]);
    }

    public function store(Request $request){
        
        $request->validate([
            'codcliente'=>'required',
            'ciabogado'=>'required',
            'codservicio'=>'required',
        ]);

        $caso=new Caso();
        $caso->codcliente=$request->codcliente;
        $caso->ciabogado=$request->ciabogado;
        $caso->codservicio=$request->codservicio;

        $caso->save();

        return redirect('/casos');
    }
    public function show($codigo){
        $caso=Caso::findOrFail($codigo);
        $servicios=Servicio::all();
        
        return view('casos.show',['caso'=>$caso,'servicios'=>$servicios]);
    }

    public function storeService($codigo,Request $request){
        $request->validate([
            'codigoservicio'=>'required',
        ]);
        $caso=Caso::findOrFail($codigo);
        
        $casoServicio=new CasoServicio();

        $casoServicio->codigocaso=$caso->codigo;
        $casoServicio->codigoservicio=$request->codigoservicio;
        
        $casoServicio->fcreacion=now();
        $casoServicio->estado=1;
        
        $casoServicio->save();
        return redirect("/casos/".$codigo);
    }

    public function createDocument($codigo,Request $request){
        $caso=Caso::findOrFail($codigo);

        return view('casos.document',['caso'=>$caso]);
    }

    public function storeDocument($codigo,Request $request){
        $caso=Caso::findOrFail($codigo);

        $request->validate([
            'nombre'=>'required',
            'numero'=>'required',
        ]);
        
        $documento=new Documento();
        $documento->nombre=$request->nombre;
        $documento->numero=$request->numero;
        $documento->codigoproceso=$caso->codigo;
        $documento->save();
        
        return redirect("/casos/".$codigo);
    }
    
}
