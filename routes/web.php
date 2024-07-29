<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticated'])->name('login.auth');


Route::middleware(['auth'])->group(function () {

    //Casos
    Route::get('/casos', [CasoController::class, 'index'])->name('caso');
    Route::get('/casos/create', [CasoController::class, 'create'])->name('caso.create');
    Route::get('/casos/{codigo}', [CasoController::class, 'show'])->name('caso.show');
    Route::get('/casos/{ci}/edit', [CasoController::class, 'edit'])->name('caso.edit');
    Route::post('/casos', [CasoController::class, 'store'])->name('caso.store');
    Route::put('/casos/{ci}', [CasoController::class, 'update'])->name('caso.update');

    Route::post('/casos/{codigo}/servicio/store', [CasoController::class, 'storeService'])->name('caso.servicio.store');

    Route::get('/casos/{codigo}/documento/create', [CasoController::class, 'createDocument'])->name('caso.documento.create');
    Route::post('/casos/{codigo}/documento/store', [CasoController::class, 'storeDocument'])->name('caso.documento.store');


    //Auth
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Abogados
    Route::get('/abogados', [AbogadoController::class, 'index'])->name('abogado');
    Route::get('/abogados/create', [AbogadoController::class, 'create'])->name('abogado.create');
    Route::get('/abogados/{ci}/edit', [AbogadoController::class, 'edit'])->name('abogado.edit');
    Route::post('/abogados', [AbogadoController::class, 'store'])->name('abogado.store');
    Route::put('/abogados/{ci}', [AbogadoController::class, 'update'])->name('abogado.update');


    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente');;
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::get('/clientes/{ci}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');
    Route::put('/clientes/{ci}', [ClienteController::class, 'update'])->name('cliente.update');


    //Users
    Route::get('/users', [UsuarioController::class, 'index'])->name('usuario');
    Route::get('/users/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::get('/users/{ci}/edit', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::post('/users', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::put('/users/{ci}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::put('users/disabled/{ci}',[UsuarioController::class,'disabled'])->name('usuario.disable');


    //Servicios
    Route::get('/servicios', [ServicioController::class, 'index'])->name('servicio');;
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicio.store');
    Route::put('/servicios/{codigo}', [ServicioController::class, 'update'])->name('servicio.update');
    Route::delete('/servicios/{codigo}', [ServicioController::class, 'delete'])->name('servicio.delete');

    //Citas
    Route::get('/citas', [CitaController::class, 'index'])->name('cita');
    Route::post('/citas', [CitaController::class, 'store'])->name('cita.store');
    Route::put('/citas/{numero}', [CitaController::class, 'update'])->name('cita.update');
    Route::delete('/citas/{numero}', [CitaController::class, 'delete'])->name('cita.delete');

    //Usuario/abogado citas
    Route::get('/citas/usuario',[UsuarioController::class,'createCite'])->name('cita.usuario.create');
    Route::post('/citas/usuario',[UsuarioController::class,'storeCite'])->name('cita.usuario.store');

    //Pagos
    Route::get('/pagos',[PagoController::class,'index'])->name('pago.index');
    Route::get('/pagos/create',[PagoController::class,'create'])->name('pago.create');
    Route::post('/pagos',[PagoController::class,'store'])->name('pago.store');
    Route::get('/pagos/{codigo}/edit',[PagoController::class,'edit'])->name('pago.edit');
    Route::put('/pagos/{codigo}',[PagoController::class,'update'])->name('pago.update');
    Route::get('/pagos/{codigo}',[PagoController::class,'show'])->name('pago.show');



});

Route::get('/api/dashboard/servicios', [DashboardController::class, 'getCantidadServiciosDistintos']);
Route::get('/api/dashboard/citas', [DashboardController::class, 'getNowYearCantidadCitas']);

Route::post('/api/pagos/{codigo}/qr',[PagoController::class,'generateQr']);
Route::post('/api/pagos/verify/callback',[PagoController::class,'callbackPay']);