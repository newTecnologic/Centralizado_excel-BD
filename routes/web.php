<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CSVController;
// use App\Http\Controllers\PruebaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//rutas excel
// Route::get('main',[App\Http\Controllers\PruebaController::class,'main'])->name('main');
Route::get('prueba',[App\Http\Controllers\PruebaController::class,'index'])->name('prueba');
Route::post('prueba/importar', [App\Http\Controllers\PruebaController::class, 'importar'])->name('importar');
Route::get('prueba/exportar', [App\Http\Controllers\PruebaController::class, 'exportar'])->name('exportar');

Route::get('/borrar-datos', [App\Http\Controllers\PruebaController::class, 'borrarDatos'])->name('borrar-datos');

