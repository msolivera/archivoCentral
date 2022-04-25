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
    Route::delete('/fichasPersonales/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'destroy'])->name('fichasPersonales.destroy');

    //rutas de los metadatos
    //paises
    Route::get('/paises', [App\Http\Controllers\PaisController::class, 'index'])->name('paises.index');
    Route::get('/paises/edit/{pais}', [App\Http\Controllers\PaisController::class, 'edit'])->name('paises.editarFicha');
    Route::post('/paises', [App\Http\Controllers\PaisController::class, 'store'])->name('paises.store');
    Route::put('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'update'])->name('paises.update');
    Route::delete('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'destroy'])->name('paises.destroy');
    //profesiones
    Route::get('/profesiones', [App\Http\Controllers\ProfesionController::class, 'index'])->name('profesiones.index');
    Route::get('/profesiones/edit/{profesion}', [App\Http\Controllers\ProfesionController::class, 'edit'])->name('profesiones.editarFicha');
    Route::post('/profesiones', [App\Http\Controllers\ProfesionController::class, 'store'])->name('profesiones.store');
    Route::put('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'update'])->name('profesiones.update');
    Route::delete('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'destroy'])->name('profesiones.destroy');
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