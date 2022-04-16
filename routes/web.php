<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Aca adentro tienen que ir todas las paginas que necesitan estar autenticadas
Route::group(['middleware' => 'auth'], 

function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Rutas de las fichas personales
    Route::get('/fichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'index'])->name('fichasPersonales.index');
    Route::get('/crearFichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'create'])->name('fichasPersonales.crearFicha');
    Route::post('/fichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'store'])->name('fichasPersonales.store');
    Route::get('/fichasPersonales/{fichaPersonalId}', [App\Http\Controllers\FichasPersonalesController::class, 'show'])->name('fichasPersonales.verFicha');
    Route::get('/fichasPersonales/edit/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'edit'])->name('fichasPersonales.editarFicha');
    Route::put('/fichasPersonales/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'update'])->name('fichasPersonales.update');
    //Route::delete('/fichasPersonales/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'destroy'])->name('fichasPersonales.destroy');
});


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function () {

})->name('login');

Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();