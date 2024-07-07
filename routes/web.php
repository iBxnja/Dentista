<?php

use App\Http\Controllers\ControladorCalendario;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorCliente;
use App\Http\Controllers\ControladorImagen;
use App\Http\Controllers\ControladorNota;
use App\Http\Controllers\ControladorOdontograma;
use App\Http\Controllers\ControladorRegister;
use App\Http\Controllers\ControladorWebInforme;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prueba;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/login', function () {
//     return view('login/login')->name('login');
// });
// Route::get('/register', function () {
//     return view('register/register');
// });

Route::get('/inicio', function () {
    return view('inicio.inicio');
})->name('inicio.inicio');


Route::get('inicio/cliente-nuevo', function () {
    return view('cliente/cliente-nuevo');
});
Route::get('inicio/cita-nuevo', function () {
    return view('citas/cita-nuevo');
});
Route::get('inicio/imagenes-nuevo', function () {
    return view('imagenes/imagenes-nuevo');
});
Route::get('inicio/notas-nuevo', function () {
    return view('notas/notas-nuevo');
});
Route::get('inicio/odontograma-nuevo', function () {
    return view('odontograma/odontograma-nuevo');
});

Route::get('json', function () {
    return view('json')->name('json');
});
Route::get('/', function () {
    return view('principio');
});



#---------------------------------------------------------------#
#                  Controlador Register                         #
#---------------------------------------------------------------#
Route::prefix('register')->group(function () {
    Route::get('/register', [ControladorRegister::class, 'create'])->name('register.create');
    Route::post('/register', [ControladorRegister::class, 'store'])->name('register.store');
});


#---------------------------------------------------------------#




#---------------------------------------------------------------#
#                  Controlador login                            #
#---------------------------------------------------------------#
Route::prefix('login')->group(function () {
    Route::get('login', [ControladorLogin::class, 'index'])->name('login.index');
    Route::post('login', [ControladorLogin::class, 'loginVerify'])->name('login.store');
    Route::post('/login/logout', [ControladorLogin::class, 'destroy'])->name('login.destroy');
});
#---------------------------------------------------------------#





#---------------------------------------------------------------#
#                  Controlador Cliente                          #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/cliente-listar', [ControladorCliente::class, 'index'])->name('cliente-listar');
    Route::post('/cliente-nuevo', [ControladorCliente::class, 'guardar']);
    Route::get('/cliente-listar/{id}/eliminar', [ControladorCliente::class, 'eliminar'])->name('cliente.eliminar');
    Route::get('/cliente-mostrar/{id}', [ControladorCliente::class, 'mostrarCliente'])->name('cliente-mostrar');
    // Route::get('/mostrar-clientes', [ControladorCliente::class, 'mostrarClientes'])->name('mostrar.clientes');
    // Route::get('/culturas', [culturaControlador::class, 'index']);
});
#---------------------------------------------------------------#






#---------------------------------------------------------------#
#                  Controlador Odontograma                      #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/odontograma-listar', [ControladorOdontograma::class, 'index'])->name('odontograma-listar');
    Route::post('/odontograma-nuevo', [ControladorOdontograma::class, 'guardar']);
    // Route::get('/odontograma-nuevo', [ControladorOdontograma::class, 'enviar'])->name('enviar-nombres');
    Route::get('/odontograma-nuevo', [ControladorOdontograma::class, 'mostrar']);
    Route::get('/odontograma-listar/{id}/eliminar', [ControladorOdontograma::class, 'eliminar'])->name('odontograma.eliminar');
    // Route::get('/odontograma', [ControladorOdontograma::class, 'odontograma']);
    Route::get('/odontograma-mostrar/{id}', [ControladorOdontograma::class, 'mostrarOdontograma'])->name('odontograma-mostrar');
    // Route::get('/odontograma-mostrar/{id}', [ControladorOdontograma::class, 'mostrarTabla']);


    // Route::post('/odontograma-nuevo/crear', [ControladorOdontograma::class, 'json'])->name('odontograma-nuevo-crear');
});


#---------------------------------------------------------------#






#---------------------------------------------------------------#
#                  Controlador Nota                             #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/notas-listar', [ControladorNota::class, 'index'])->name('notas-listar');
    Route::get('/notas-nuevo', [ControladorNota::class, 'enviarNombreApellido'])->name('notas-nuevo');
    Route::post('/notas-nuevo', [ControladorNota::class, 'guardar']);
    Route::get('/notas-listar/{id}/eliminar', [ControladorNota::class, 'eliminar'])->name('notas.eliminar');
    Route::get('/notas-mostrar/{id}', [ControladorNota::class, 'mostrarNota'])->name('notas-mostrar');



});
#---------------------------------------------------------------#






#---------------------------------------------------------------#
#                   Controlador Citas                           #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/cita-listar', [ControladorCalendario::class, 'index'])->name('cita-listar');
    Route::get('/cita-listado', [ControladorCalendario::class, 'enviarListado'])->name('cita-listado');
    Route::get('/cita-listado', [ControladorCalendario::class, 'buscarpor']);
    Route::get('/cita-listar/events', [ControladorCalendario::class, 'getEvents'])->name('cita-listar-events');
    Route::post('/cita-nuevo/crear', [ControladorCalendario::class, 'crearCita'])->name('cita-nuevo-crear');
    Route::get('/cita-listar/{id}/eliminar', [ControladorCalendario::class, 'eliminar'])->name('cita.eliminar');
    Route::get('/cita-nuevo', [ControladorCalendario::class, 'enviarNombreApellido']);
});


#---------------------------------------------------------------#





#---------------------------------------------------------------#
#                   Controlador imagenes                        #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/imagenes-nuevo', [ControladorImagen::class, 'enviarNombreApellido'])->name('imagenes-nuevo');
    Route::post('/imagenes-nuevo', [ControladorImagen::class, 'guardar']);
    Route::get('/imagenes-listar', [ControladorImagen::class, 'index'])->name('imagenes');
    Route::get('/imagenes-listar/{id}/eliminar', [ControladorImagen::class, 'eliminar'])->name('imagenes.eliminar');
});
#---------------------------------------------------------------#





#---------------------------------------------------------------#
#                   Controlador informe                         #
#---------------------------------------------------------------#
Route::prefix('inicio')->group(function () {
    Route::get('/informe-listar', [ControladorWebInforme::class, 'index'])->name('informe-listar');
});
#---------------------------------------------------------------#





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
