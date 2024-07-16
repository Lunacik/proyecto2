<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuarioController;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticated']);


Route::middleware(['auth'])->group(function () {

    //Auth
    Route::get('/logout', [LoginController::class, 'logout']);

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //Abogados
    Route::get('/abogados', [AbogadoController::class, 'index']);
    Route::get('/abogados/create', [AbogadoController::class, 'create']);
    Route::get('/abogados/{ci}/edit', [AbogadoController::class, 'edit']);
    Route::post('/abogados', [AbogadoController::class, 'store']);
    Route::put('/abogados/{ci}', [AbogadoController::class, 'update']);

    //Casos
    Route::get('/casos', [CasoController::class, 'index']);
    Route::get('/casos/create', [CasoController::class, 'create']);
    Route::get('/casos/{codigo}', [CasoController::class, 'show']);
    Route::get('/casos/{ci}/edit', [CasoController::class, 'edit']);
    Route::post('/casos', [CasoController::class, 'store']);
    Route::put('/casos/{ci}', [CasoController::class, 'update']);

    Route::post('/casos/{codigo}/servicio/store', [CasoController::class, 'storeService']);

    Route::get('/casos/{codigo}/documento/create', [CasoController::class, 'createDocument']);
    Route::post('/casos/{codigo}/documento/store', [CasoController::class, 'storeDocument']);



    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::get('/clientes/create', [ClienteController::class, 'create']);
    Route::get('/clientes/{ci}/edit', [ClienteController::class, 'edit']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::put('/clientes/{ci}', [ClienteController::class, 'update']);


    //Users
    Route::get('/users', [UsuarioController::class, 'index']);
    Route::get('/users/create', [UsuarioController::class, 'create']);
    Route::get('/users/{ci}/edit', [UsuarioController::class, 'edit']);
    Route::post('/users', [UsuarioController::class, 'store']);
    Route::put('/users/{ci}', [UsuarioController::class, 'update']);


    //Servicios
    Route::get('/servicios', [ServicioController::class, 'index']);
    Route::post('/servicios', [ServicioController::class, 'store']);
    Route::put('/servicios/{codigo}', [ServicioController::class, 'update']);
});

