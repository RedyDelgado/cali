<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelControlController;
use App\Http\Controllers\DescargarController;
use App\Http\Controllers\IdentificacionController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\AlumnoController;

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
//     return view('livewire.panel-control-component');
// });
Route::get('/', [PanelControlController::class, 'index'])->name('index');
Route::get('identificacion', [IdentificacionController::class, 'index'])->name('index');
Route::get('respuesta', [RespuestaController::class, 'index'])->name('index');
Route::get('alumno', [AlumnoController::class, 'index'])->name('index');
Route::get('exportexcel/{ciclo}/{examen}/{identificacion}/{grupo}/{tema}/{modalidad}', [DescargarController::class,'exportexcel'])->name('exportexcel');