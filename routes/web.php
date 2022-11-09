<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\tarifaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//el inicio de la pagina y el login

Route::get('/', [LoginController::class, 'index'])->name('login');

//Registrar Usuario
Route::get('/crear_cuenta', [UsuarioController::class, 'index'])->name('registrar');
Route::post('/crear_cuenta', [UsuarioController::class, 'store'])->name('store');

//mandar datos de login
Route::post('/Entrar', [LoginController::class, 'store'])->name('storelogin');

//inicio sesion y es donde esta para crear la transaccion
Route::get('/transacciones', [InicioController::class, 'index'])->name('Inicio_sesion');
//Registrar Transaccion
Route::post('/registrartransaccion',[InicioController::class, 'store'])->name('RegistrarTransaccion');



Route::get('/tarifa', [tarifaController::class, 'index'])->name('tarifa');
Route::post('/registrar_tarifa', [tarifaController::class, 'store'])->name('Registrar_tarifa');

//Editar, mandamos el id del registro para ya asi editarlo
Route::get('/update/{transaccion}', [InicioController::class, 'edit'])->name('edit');

Route::get('/estado/{id?}', [EstadoController::class, 'index'])->name('estado');
//para editar el estado
Route::post('/estado/edit', [EstadoController::class, 'edit_estado'])->name('edit_estado');


Route::get('/cerrar', [LogoutController::class, 'logout'])->name('cerrar_sesion');
