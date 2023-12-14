<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

//model o modelo esta relacionado con el dato de las tablas

Route::get('/', [PagesController::class, 'fnIndex']) -> name('xInicio');

Route::post('/', [PagesController::class, 'fnRegistrar']) -> name('Estudiante.xRegistrar');

Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle']) -> name('Estudiante.xDetalle');

Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar']) -> name('Estudiante.xActualizar');

Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate']) -> name('Estudiante.xUpdate');

Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') -> name('xGaleria');

Route::get('/lista', [PagesController::class, 'fnLista']) -> name('xLista');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
}) -> name('xInicio');

Route::get('/saludo', function () {
    return "HOLA MUNDO DESDE LARAVEL...";
});

Route::get('/galeria/{numero?}', function ($numero=null) {
    return "Este es el codigo de la foto: ".$numero;
}) -> where('numero', '[0-9]+');

Route::view('/galeria', 'pagGaleria', ['valor' => 15]) -> name('xGaleria');

Route::get('/lista', function () {
    return view('pagLista');
}) -> name('xLista');
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
