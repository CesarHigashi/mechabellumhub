<?php

use App\Http\Controllers\ConflictController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\TankController;
use App\Models\Plane;
use App\Models\Tank;
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

Route::get('/', function () {
    return view('welcome');
});

/* RUTA PARA TODOS LOS METODOS */
Route::resource('plane', PlaneController::class);
Route::resource('tank', TankController::class);
Route::resource('conflict', ConflictController::class);
Route::resource('nation', NationController::class);

/* Rutas de metodos de restauracion */
/* Tanques */
Route::get('/tank/restore/{id}', [TankController::class, 'restore'])->name('tank.restore');
Route::get('/tank/restoreAll', [TankController::class, 'restoreAll'])->name('tank.restore.all');
/* Aviones */
Route::get('/plane/restore/{id}', [PlaneController::class, 'restore'])->name('plane.restore');
Route::get('/plane/restoreAll', [PlaneController::class, 'restoreAll'])->name('plane.restore.all');
/* Conflictos */
Route::get('/conflict/restore/{id}', [ConflictController::class, 'restore'])->name('conflict.restore');
Route::get('/conflict/restoreAll', [ConflictController::class, 'restoreAll'])->name('conflict.restore.all');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
