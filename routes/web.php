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

Route::group(['middleware' => 'auth'], 

function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/fichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'index'])->name('mvc.fichasPersonales.index');
    //Route::get('/fichasPersonales/create', [App\Http\Controllers\FichasPersonalesController::class, 'create'])->name('fichasPersonales.create');
    //Route::post('/fichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'store'])->name('fichasPersonales.store');
    //Route::get('/fichasPersonales/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'show'])->name('fichasPersonales.show');
    //Route::get('/fichasPersonales/{fichaPersona}/edit', [App\Http\Controllers\FichasPersonalesController::class, 'edit'])->name('fichasPersonales.edit');
    //Route::put('/fichasPersonales/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'update'])->name('fichasPersonales.update');
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