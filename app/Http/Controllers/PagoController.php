<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\BoletaPago;
use App\Models\Cliente;
use App\Models\Counter;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Services\PagoFacil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    private static $CODIGO_COUNTER=9;

    public function index()
    {
        $user = Auth::user()->usuario;
        Counter::plusCounter(static::$CODIGO_COUNTER);
        $contador=Counter::getCounter(static::$CODIGO_COUNTER);

        if($user->tipo==Usuario::$ABOGADO){
            $pagos = BoletaPago::where('ciabogado', $user->ci)->get();
            return view('pagos.index', ['pagos' => $pagos,'contador'=>$contador]);    
        }

        if($user->tipo==Usuario::$CLIENTE){
            $pagos = BoletaPago::where('cicliente', $user->ci)->get();
            return view('pagos.index', ['pagos' => $pagos,'contador'=>$contador]);    
        }
        

        if($user->tipo==Usuario::$ADMINISTRADOR){
            $pagos=BoletaPago::all();
            return view('pagos.index', ['pagos' => $pagos,'contador'=>$contador]);    
        }

        
    }

    public function show($codigo)
    {
        $pago = BoletaPago::findOrFail($codigo);
        return view('pagos.show', ['pago' => $pago]);
    }

    public function create()
    {
        $servicios = Servicio::all();
        $clientes = Cliente::all();

        return view('pagos.create', ['servicios' => $servicios, 'clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $user = Auth::user()->usuario_ci;

        $abogado = Abogado::findOrFail($user);
        $request->validate([
            'cicliente' => 'required',
            'codigoservicio' => 'required',
            'monto' => 'required'
        ]);

        $pago = new BoletaPago();
        $pago->monto = $request->monto;
        $pago->femision = now();
        $pago->ciabogado = $abogado->ci;
        $pago->cicliente = $request->cicliente;
        $pago->codigoservicio = $request->codigoservicio;
        $pago->estado = 1;

        $pago->save();

        return redirect('/pagos');
        //1->Proceso
        //2->Pagado
    }

    //APIS
    public function callbackPay(Request $request)
    {
        
        $Venta = $request->input("PedidoID");
        $Fecha = $request->input("Fecha");
        $NuevaFecha = date("Y-m-d", strtotime($Fecha));
        $Hora = $request->input("Hora");
        $MetodoPago = $request->input("MetodoPago");
        $Estado = $request->input("Estado");
        $Ingreso = true;

        $idBusiness=explode("-",$Venta)[3];

       try {
           $pago=BoletaPago::find($idBusiness);
           if($pago==null){
               return response()->json(['error' => 1, 'status' => 1, 'messageSistema' => "No existe el pago", 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false]);
           }

           $pago->estado=$Estado;
           $pago->update();
           
           //$arreglo = ['venta' => $service, 'fecha' => $Fecha, 'hora' => $Hora, 'metodoPago' => $MetodoPago,'estado'=>$Estado];
           $arreglo = ['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true];
       } catch (\Throwable $th) {
           $arreglo = ['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false];
       }

       return response()->json($arreglo);
    }

    public function verifyPay()
    {

    }
    public function updateTransaction()
    {
    }
    public function generateQr(Request $request, $codigo)
    {

        $boletaPago = BoletaPago::findOrFail($codigo);

        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required'
        ]);
        $user = [
            'telefono' => $request->telefono,
            'nombre' => $request->nombre,
            'correo' => $request->email,
        ];

        $pagoFacil = new PagoFacil();
        $response = $pagoFacil->generateQr($user, $boletaPago->codigo);

        if (!$response['ok']) {
            return response($response, 500);
        }
        if ($response['result']->values != null) {
            $laResult = $response['result']->values;
            $laValues = explode(";", $laResult)[1];

            $codigoTransaction = explode(';', $laResult)[0];
            $laQrImage = "data:image/png;base64," . json_decode($laValues)->qrImage;

            $boletaPago->transaccion_id=$codigoTransaction;
            $boletaPago->update();

            return response([
                'ok'=>true,
                'message'=>'ok',
                'result'=>[
                    'qr'=>$laQrImage
                ]
                ],200);
        }

        return response([
            'ok'=>false,
            'message'=>$response['result']->messageSistema,
            'result'=>null

        ], 500);
    }
}
