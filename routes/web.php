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
Route::group(
    ['middleware' => 'auth'],

    function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        //Rutas de las fichas personales
        Route::get('/fichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'index'])->name('fichasPersonales.index');
        Route::get('/fichasIngresos', [App\Http\Controllers\FichasPersonalesController::class, 'indexIngresos'])->name('fichasIngresos.index');
        Route::post('/fichasIngresos', [App\Http\Controllers\FichasPersonalesController::class, 'storeIngreso'])->name('fichasIngresos.storeIngreso');
        Route::get('/fichasIngresos/{fichaPersona}', [App\Http\Controllers\FichasPersonalesController::class, 'updateIngreso'])->name('fichasIngresos.updateIngreso');
        //Se comenta porque no se va a utilzar por el momento
        //Route::get('/crearFichasPersonales', [App\Http\Controllers\FichasPersonalesController::class, 'create'])->name('fichasPersonales.crearFicha');
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
        Route::get('/profesiones/edit/{profesion}', [App\Http\Controllers\ProfesionController::class, 'edit'])->name('profesiones.editar');
        Route::post('/profesiones', [App\Http\Controllers\ProfesionController::class, 'store'])->name('profesiones.store');
        Route::put('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'update'])->name('profesiones.update');
        Route::delete('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'destroy'])->name('profesiones.destroy');
        //estado civil
        Route::get('/estadoCivil', [App\Http\Controllers\EstadoCivilController::class, 'index'])->name('estadoCivil.index');
        Route::get('/estadoCivil/edit/{estadoCivil}', [App\Http\Controllers\EstadoCivilController::class, 'edit'])->name('estadoCivil.editar');
        Route::post('/estadoCivil', [App\Http\Controllers\EstadoCivilController::class, 'store'])->name('estadoCivil.store');
        Route::put('/estadoCivil/{estadoCivil}', [App\Http\Controllers\EstadoCivilController::class, 'update'])->name('estadoCivil.update');
        Route::delete('/estadoCivil/{estadoCivil}', [App\Http\Controllers\EstadoCivilController::class, 'destroy'])->name('estadoCivil.destroy');
        //fuerza
        Route::get('/fuerza', [App\Http\Controllers\FuerzaController::class, 'index'])->name('fuerza.index');
        Route::get('/fuerza/edit/{fuerza}', [App\Http\Controllers\FuerzaController::class, 'edit'])->name('fuerza.editar');
        Route::post('/fuerza', [App\Http\Controllers\FuerzaController::class, 'store'])->name('fuerza.store');
        Route::put('/fuerza/{fuerza}', [App\Http\Controllers\FuerzaController::class, 'update'])->name('fuerza.update');
        Route::delete('/fuerza/{fuerza}', [App\Http\Controllers\FuerzaController::class, 'destroy'])->name('fuerza.destroy');
        //organizacion
        Route::get('/organizacion', [App\Http\Controllers\OrganizacionController::class, 'index'])->name('organizacion.index');
        Route::get('/organizacion/edit/{organizacion}', [App\Http\Controllers\OrganizacionController::class, 'edit'])->name('organizacion.editar');
        Route::post('/organizacion', [App\Http\Controllers\OrganizacionController::class, 'store'])->name('organizacion.store');
        Route::put('/organizacion/{organizacion}', [App\Http\Controllers\OrganizacionController::class, 'update'])->name('organizacion.update');
        Route::delete('/organizacion/{organizacion}', [App\Http\Controllers\OrganizacionController::class, 'destroy'])->name('organizacion.destroy');
        //ideologia
        Route::get('/ideologia', [App\Http\Controllers\IdeologiaController::class, 'index'])->name('ideologia.index');
        Route::get('/ideologia/edit/{ideologia}', [App\Http\Controllers\IdeologiaController::class, 'edit'])->name('ideologia.editar');
        Route::post('/ideologia', [App\Http\Controllers\IdeologiaController::class, 'store'])->name('ideologia.store');
        Route::put('/ideologia/{ideologia}', [App\Http\Controllers\IdeologiaController::class, 'update'])->name('ideologia.update');
        Route::delete('/ideologia/{ideologia}', [App\Http\Controllers\IdeologiaController::class, 'destroy'])->name('ideologia.destroy');
        //departamentos
        Route::get('/departamentos', [App\Http\Controllers\DepartamentosController::class, 'index'])->name('departamentos.index');
        Route::get('/departamentos/edit/{departamento}', [App\Http\Controllers\DepartamentosController::class, 'edit'])->name('departamentos.editar');
        Route::post('/departamentos', [App\Http\Controllers\DepartamentosController::class, 'store'])->name('departamentos.store');
        Route::put('/departamentos/{departamento}', [App\Http\Controllers\DepartamentosController::class, 'update'])->name('departamentos.update');
        Route::delete('/departamentos/{departamento}', [App\Http\Controllers\DepartamentosController::class, 'destroy'])->name('departamentos.destroy');
        //parentesco
        Route::get('/parentesco', [App\Http\Controllers\ParentescoController::class, 'index'])->name('parentesco.index');
        Route::get('/parentesco/edit/{parentesco}', [App\Http\Controllers\ParentescoController::class, 'edit'])->name('parentesco.editar');
        Route::post('/parentesco', [App\Http\Controllers\ParentescoController::class, 'store'])->name('parentesco.store');
        Route::put('/parentesco/{parentesco}', [App\Http\Controllers\ParentescoController::class, 'update'])->name('parentesco.update');
        Route::delete('/parentesco/{parentesco}', [App\Http\Controllers\ParentescoController::class, 'destroy'])->name('parentesco.destroy');
        //tema
        Route::get('/tema', [App\Http\Controllers\TemaController::class, 'index'])->name('tema.index');
        Route::get('/tema/edit/{tema}', [App\Http\Controllers\TemaController::class, 'edit'])->name('tema.editar');
        Route::post('/tema', [App\Http\Controllers\TemaController::class, 'store'])->name('tema.store');
        Route::put('/tema/{tema}', [App\Http\Controllers\TemaController::class, 'update'])->name('tema.update');
        Route::delete('/tema/{tema}', [App\Http\Controllers\TemaController::class, 'destroy'])->name('tema.destroy');
        //clasificacion
        Route::get('/clasificacion', [App\Http\Controllers\ClasificacionController::class, 'index'])->name('clasificacion.index');
        Route::get('/clasificacion/edit/{clasificacion}', [App\Http\Controllers\ClasificacionController::class, 'edit'])->name('clasificacion.editar');
        Route::post('/clasificacion', [App\Http\Controllers\ClasificacionController::class, 'store'])->name('clasificacion.store');
        Route::put('/clasificacion/{clasificacion}', [App\Http\Controllers\ClasificacionController::class, 'update'])->name('clasificacion.update');
        Route::delete('/clasificacion/{clasificacion}', [App\Http\Controllers\ClasificacionController::class, 'destroy'])->name('clasificacion.destroy');
        //unidad
        Route::get('/unidad', [App\Http\Controllers\UnidadController::class, 'index'])->name('unidad.index');
        Route::get('/unidad/edit/{unidad}', [App\Http\Controllers\UnidadController::class, 'edit'])->name('unidad.editar');
        Route::post('/unidad', [App\Http\Controllers\UnidadController::class, 'store'])->name('unidad.store');
        Route::put('/unidad/{unidad}', [App\Http\Controllers\UnidadController::class, 'update'])->name('unidad.update');
        Route::delete('/unidad/{unidad}', [App\Http\Controllers\UnidadController::class, 'destroy'])->name('unidad.destroy');
        //situacion
        Route::get('/situacion', [App\Http\Controllers\SituacionController::class, 'index'])->name('situacion.index');
        Route::get('/situacion/edit/{situacion}', [App\Http\Controllers\SituacionController::class, 'edit'])->name('situacion.editar');
        Route::post('/situacion', [App\Http\Controllers\SituacionController::class, 'store'])->name('situacion.store');
        Route::put('/situacion/{situacion}', [App\Http\Controllers\SituacionController::class, 'update'])->name('situacion.update');
        Route::delete('/situacion/{situacion}', [App\Http\Controllers\SituacionController::class, 'destroy'])->name('situacion.destroy');
        //necesidadConocer
        Route::get('/necesidadConocer', [App\Http\Controllers\NecesidadConocerController::class, 'index'])->name('necesidadConocer.index');
        Route::get('/necesidadConocer/edit/{necesidadConocer}', [App\Http\Controllers\NecesidadConocerController::class, 'edit'])->name('necesidadConocer.editar');
        Route::post('/necesidadConocer', [App\Http\Controllers\NecesidadConocerController::class, 'store'])->name('necesidadConocer.store');
        Route::put('/necesidadConocer/{necesidadConocer}', [App\Http\Controllers\NecesidadConocerController::class, 'update'])->name('necesidadConocer.update');
        Route::delete('/necesidadConocer/{necesidadConocer}', [App\Http\Controllers\NecesidadConocerController::class, 'destroy'])->name('necesidadConocer.destroy');
        //serieDocumental
        Route::get('/serieDocumental', [App\Http\Controllers\SerieDocumentalController::class, 'index'])->name('serieDocumental.index');
        Route::get('/serieDocumental/edit/{serieDocumental}', [App\Http\Controllers\SerieDocumentalController::class, 'edit'])->name('serieDocumental.editar');
        Route::post('/serieDocumental', [App\Http\Controllers\SerieDocumentalController::class, 'store'])->name('serieDocumental.store');
        Route::put('/serieDocumental/{serieDocumental}', [App\Http\Controllers\SerieDocumentalController::class, 'update'])->name('serieDocumental.update');
        Route::delete('/serieDocumental/{serieDocumental}', [App\Http\Controllers\SerieDocumentalController::class, 'destroy'])->name('serieDocumental.destroy');
        //palabraClave
        Route::get('/palabraClave', [App\Http\Controllers\PalabraClaveController::class, 'index'])->name('palabraClave.index');
        Route::get('/palabraClave/edit/{palabraClave}', [App\Http\Controllers\PalabraClaveController::class, 'edit'])->name('palabraClave.editar');
        Route::post('/palabraClave', [App\Http\Controllers\PalabraClaveController::class, 'store'])->name('palabraClave.store');
        Route::put('/palabraClave/{palabraClave}', [App\Http\Controllers\PalabraClaveController::class, 'update'])->name('palabraClave.update');
        Route::delete('/palabraClave/{palabraClave}', [App\Http\Controllers\PalabraClaveController::class, 'destroy'])->name('palabraClave.destroy');
        //ambito
        Route::get('/ambito', [App\Http\Controllers\AmbitoController::class, 'index'])->name('ambito.index');
        Route::get('/ambito/edit/{ambito}', [App\Http\Controllers\AmbitoController::class, 'edit'])->name('ambito.editar');
        Route::post('/ambito', [App\Http\Controllers\AmbitoController::class, 'store'])->name('ambito.store');
        Route::put('/ambito/{ambito}', [App\Http\Controllers\AmbitoController::class, 'update'])->name('ambito.update');
        Route::delete('/ambito/{ambito}', [App\Http\Controllers\AmbitoController::class, 'destroy'])->name('ambito.destroy');
        //tipoAnotacion
        Route::get('/tipoAnotacion', [App\Http\Controllers\TipoAnotacionController::class, 'index'])->name('tipoAnotacion.index');
        Route::get('/tipoAnotacion/edit/{tipoAnotacion}', [App\Http\Controllers\TipoAnotacionController::class, 'edit'])->name('tipoAnotacion.editar');
        Route::post('/tipoAnotacion', [App\Http\Controllers\TipoAnotacionController::class, 'store'])->name('tipoAnotacion.store');
        Route::put('/tipoAnotacion/{tipoAnotacion}', [App\Http\Controllers\TipoAnotacionController::class, 'update'])->name('tipoAnotacion.update');
        Route::delete('/tipoAnotacion/{tipoAnotacion}', [App\Http\Controllers\TipoAnotacionController::class, 'destroy'])->name('tipoAnotacion.destroy');
        //ubicacion
        Route::get('/ubicacion', [App\Http\Controllers\UbicacionController::class, 'index'])->name('ubicacion.index');
        Route::get('/ubicacion/edit/{ubicacion}', [App\Http\Controllers\UbicacionController::class, 'edit'])->name('ubicacion.editar');
        Route::post('/ubicacion', [App\Http\Controllers\UbicacionController::class, 'store'])->name('ubicacion.store');
        Route::put('/ubicacion/{ubicacion}', [App\Http\Controllers\UbicacionController::class, 'update'])->name('ubicacion.update');
        Route::delete('/ubicacion/{ubicacion}', [App\Http\Controllers\UbicacionController::class, 'destroy'])->name('ubicacion.destroy');
        //tipoDocumento
        Route::get('/tipoDocumento', [App\Http\Controllers\TipoDocumentoController::class, 'index'])->name('tipoDocumento.index');
        Route::get('/tipoDocumento/edit/{tipoDocumento}', [App\Http\Controllers\TipoDocumentoController::class, 'edit'])->name('tipoDocumento.editar');
        Route::post('/tipoDocumento', [App\Http\Controllers\TipoDocumentoController::class, 'store'])->name('tipoDocumento.store');
        Route::put('/tipoDocumento/{tipoDocumento}', [App\Http\Controllers\TipoDocumentoController::class, 'update'])->name('tipoDocumento.update');
        Route::delete('/tipoDocumento/{tipoDocumento}', [App\Http\Controllers\TipoDocumentoController::class, 'destroy'])->name('tipoDocumento.destroy');
        //fuenteDocumento
        Route::get('/fuenteDocumento', [App\Http\Controllers\FuenteDocumentoController::class, 'index'])->name('fuenteDocumento.index');
        Route::get('/fuenteDocumento/edit/{fuenteDocumento}', [App\Http\Controllers\FuenteDocumentoController::class, 'edit'])->name('fuenteDocumento.editar');
        Route::post('/fuenteDocumento', [App\Http\Controllers\FuenteDocumentoController::class, 'store'])->name('fuenteDocumento.store');
        Route::put('/fuenteDocumento/{fuenteDocumento}', [App\Http\Controllers\FuenteDocumentoController::class, 'update'])->name('fuenteDocumento.update');
        Route::delete('/fuenteDocumento/{fuenteDocumento}', [App\Http\Controllers\FuenteDocumentoController::class, 'destroy'])->name('fuenteDocumento.destroy');
        //grados
        Route::get('/grado', [App\Http\Controllers\GradoController::class, 'index'])->name('grado.index');
        Route::get('grados/crear', [App\Http\Controllers\GradoController::class, 'create'])->name('grados.crear');
        Route::get('/grado/edit/{grado}', [App\Http\Controllers\GradoController::class, 'edit'])->name('grado.editar');
        Route::post('/grado', [App\Http\Controllers\GradoController::class, 'store'])->name('grado.store');
        Route::put('/grado/{grado}', [App\Http\Controllers\GradoController::class, 'update'])->name('grado.update');
        Route::delete('/grado/{grado}', [App\Http\Controllers\GradoController::class, 'destroy'])->name('grado.destroy');
        //armaCuerpo
        Route::get('/armaCuerpo', [App\Http\Controllers\ArmaCuerpoController::class, 'index'])->name('armaCuerpo.index');
        Route::get('armaCuerpo/crear', [App\Http\Controllers\ArmaCuerpoController::class, 'create'])->name('armaCuerpo.crear');
        Route::get('/armaCuerpo/edit/{armaCuerpo}', [App\Http\Controllers\ArmaCuerpoController::class, 'edit'])->name('armaCuerpo.editar');
        Route::post('/armaCuerpo', [App\Http\Controllers\ArmaCuerpoController::class, 'store'])->name('armaCuerpo.store');
        Route::put('/armaCuerpo/{armaCuerpo}', [App\Http\Controllers\ArmaCuerpoController::class, 'update'])->name('armaCuerpo.update');
        Route::delete('/armaCuerpo/{armaCuerpo}', [App\Http\Controllers\ArmaCuerpoController::class, 'destroy'])->name('armaCuerpo.destroy');
        //ciudad
        Route::get('/ciudad', [App\Http\Controllers\CiudadController::class, 'index'])->name('ciudad.index');
        Route::get('ciudades/crear', [App\Http\Controllers\CiudadController::class, 'create'])->name('ciudades.crear');
        Route::get('/ciudad/edit/{ciudad}', [App\Http\Controllers\CiudadController::class, 'edit'])->name('ciudad.editar');
        Route::post('/ciudad', [App\Http\Controllers\CiudadController::class, 'store'])->name('ciudad.store');
        Route::put('/ciudad/{ciudad}', [App\Http\Controllers\CiudadController::class, 'update'])->name('ciudad.update');
        Route::delete('/ciudad/{ciudad}', [App\Http\Controllers\CiudadController::class, 'destroy'])->name('ciudad.destroy');
        //subtema
        Route::get('/subTema', [App\Http\Controllers\SubTemaController::class, 'index'])->name('subTema.index');
        Route::get('subTema/crear', [App\Http\Controllers\SubTemaController::class, 'create'])->name('subTema.crear');
        Route::get('/subTema/edit/{subTema}', [App\Http\Controllers\SubTemaController::class, 'edit'])->name('subTema.editar');
        Route::post('/subTema', [App\Http\Controllers\SubTemaController::class, 'store'])->name('subTema.store');
        Route::put('/subTema/{subTema}', [App\Http\Controllers\SubTemaController::class, 'update'])->name('subTema.update');
        Route::delete('/subTema/{subTema}', [App\Http\Controllers\SubTemaController::class, 'destroy'])->name('subTema.destroy');

        //relaciones N-N
        Route::post('/fichasPersonalesIdeologia/{fichaPersona}', [App\Http\Controllers\FichaPersonalIdeologiaController::class, 'store'])->name('fichasPersonalesIdeologia.store');
        Route::delete('/fichasPersonalesIdeologia/{fichaPersona}', [App\Http\Controllers\FichaPersonalIdeologiaController::class, 'destroy'])->name('fichasPersonalesIdeologia.destroy');
        Route::post('/fichasPersonalesProfesion/{fichaPersona}', [App\Http\Controllers\FichaPersonalProfesionController::class, 'store'])->name('fichasPersonalesProfesion.store');
        Route::delete('/fichasPersonalesProfesion/{fichaPersona}', [App\Http\Controllers\FichaPersonalProfesionController::class, 'destroy'])->name('fichasPersonalesProfesion.destroy');
        //domicilios
        Route::post('/domicilio/{fichaPersona}', [App\Http\Controllers\DomicilioController::class, 'store'])->name('domicilio.store');
        Route::delete('/domicilio/{fichaPersona}', [App\Http\Controllers\DomicilioController::class, 'destroy'])->name('domicilio.destroy');
        //estudios
        Route::post('/estudio/{fichaPersona}', [App\Http\Controllers\EstudioController::class, 'store'])->name('estudio.store');
        Route::delete('/estudio/{fichaPersona}', [App\Http\Controllers\EstudioController::class, 'destroy'])->name('estudio.destroy');
        //rol organizacion
        Route::post('/rolOrganizacion/{fichaPersona}', [App\Http\Controllers\RolOrganizacionController::class, 'store'])->name('rolOrganizacion.store');
        Route::delete('/rolOrganizacion/{fichaPersona}', [App\Http\Controllers\RolOrganizacionController::class, 'destroy'])->name('rolOrganizacion.destroy');
        //anotaciones
        Route::post('/anotacion/{fichaPersona}', [App\Http\Controllers\AnotacionController::class, 'store'])->name('anotacion.store');
        Route::delete('/anotacion/{fichaPersona}', [App\Http\Controllers\AnotacionController::class, 'destroy'])->name('anotacion.destroy');
        //pariente
        Route::post('/parientes/{fichaPersona}', [App\Http\Controllers\ParientesController::class, 'store'])->name('parientes.store');
        Route::delete('/parientes/{fichaPersona}', [App\Http\Controllers\ParientesController::class, 'destroy'])->name('parientes.destroy');
    }
);


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function () {
})->name('login');

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
