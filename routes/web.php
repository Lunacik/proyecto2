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


    //Servicios
    Route::get('/servicios', [ServicioController::class, 'index'])->name('servicio');;
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicio.store');
    Route::put('/servicios/{codigo}', [ServicioController::class, 'update'])->name('servicio.update');

    Route::get('/citas', function () {
        return 'Loading...';
    })->name('cita');
});
