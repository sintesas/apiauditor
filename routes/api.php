<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Config\PerfilController;
use App\Http\Controllers\Inspec\AnotacionController;
use App\Http\Controllers\Inspec\InspeccionController;
use App\Http\Controllers\Param\ListaController;
use App\Http\Controllers\Param\UnidadController;

use App\Http\Controllers\Mail\MailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, 'login']);
Route::any('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'config'], function() {
    //perfil
    Route::post('roles', [PerfilController::class, 'getRoles']);
    Route::post('changePassword', [PerfilController::class, 'changePassword']);
    Route::post('resetPassword', [PerfilController::class, 'resetPassword']);
});

Route::post('enviar', [MailController::class, 'index']);

Route::group(['prefix' => 'admin'], function() {
    // usuarios
    Route::get('personas', [UserController::class, 'getPersonas']);
    Route::get('tipodocumentos', [UserController::class, 'getTipoDocumento']);
    Route::get('usuarios', [UserController::class, 'getUsers']);
    Route::post('usuario/crearPersonal', [UserController::class, 'crearPersonal']);
    Route::post('usuario/actualizarPersonal', [UserController::class, 'actualizarPersonal']);
    Route::post('usuario/crearUsuario', [UserController::class, 'crearUsuario']);
    Route::post('usuario/actualizarUsuario', [UserController::class, 'actualizarUsuario']);
    Route::post('usuario/crearUsuarioRol', [UserController::class, 'crearUsuarioRol']);
    Route::post('usuario/actualizarUsuarioRol', [UserController::class, 'actualizarUsuarioRol']);
    Route::post('usuario/getUsuariosRolesById', [UserController::class, 'getUsuariosRolesById']);
    Route::post('usuario/eliminarUsuariosRolesId', [UserController::class, 'eliminarUsuariosRolesId']);
    Route::post('usuario/asignarMenu', [UserController::class, 'crearAsignarMenu']);
    Route::get('usuario/getRolPrivilegiosPantalla', [UserController::class, 'getRolPrivilegiosPantalla']);
    Route::get('usuario/personales_activos', [UserController::class, 'getPersonalesActivos']);
    Route::post('usuario/permisos', [UserController::class, 'getPermisos']);
    Route::get('usuario/getUsersLDAP', [UserController::class, 'getUsersLDAP']);

    //roles
    Route::get('roles', [RolController::class, 'getRoles']);
    Route::post('rol/crearRol', [RolController::class, 'crearRol']);
    Route::post('rol/actualizarRol', [RolController::class, 'actualizarRol']);
    Route::get('rol/getRolesActivos', [RolController::class, 'getRolesActivos']);
    Route::get('rol/getModulos', [RolController::class, 'getModulos']);
    Route::post('rol/crearRolPrivilegios', [RolController::class, 'crearRolPrivilegios']);
    Route::post('rol/actualizarRolPrivilegios', [RolController::class, 'actualizarRolPrivilegios']);
    Route::post('rol/getRolPrivilegiosById', [RolController::class, 'getRolPrivilegiosById']);
    Route::post('rol/eliminarRolPrivilegiosById', [RolController::class, 'eliminarRolPrivilegiosById']);
});

Route::group(['prefix' => 'param'], function() {
    // listas
    Route::get('listas', [ListaController::class,'getListas']);
    Route::post('lista/crearLista', [ListaController::class, 'crearLista']);
    Route::post('lista/actualizarLista', [ListaController::class, 'actualizarLista']);
    Route::post('lista/getListasById', [ListaController::class, 'getListasId']);
    Route::get('lista/getListaDetalleFull', [ListaController::class, 'getListaDetalleFull']);
    Route::post('lista/crearListaDetalle', [ListaController::class, 'crearListaDetalle']);
    Route::post('lista/actualizarListaDetalle', [ListaController::class, 'actualizarListaDetalle']);

    //unidades
    Route::get('unidades', [UnidadController::class, 'getUnidades']);
    Route::post('unidad/crearUnidades', [UnidadController::class, 'crearUnidades']);
    Route::post('unidad/actualizarUnidades', [UnidadController::class, 'actualizarUnidad']);
    Route::post('unidad/getUnidadesById', [UnidadController::class, 'getUnidadesById']);
});

Route::group(['prefix' => 'inspec'], function() {
    // Inspecciones
    Route::get('inspecciones', [InspeccionController::class, 'getInspecciones']);
    Route::get('inspeccion/getUnidadDependencias', [InspeccionController::class, 'getUnidadDependencias']);
    Route::post('inspeccion/crearInspeccion', [InspeccionController::class, 'crearInspeccion']);
    Route::post('inspeccion/actualizarInspeccion', [InspeccionController::class, 'actualizarInspeccion']);
    Route::post('inspeccion/getInspeccionCriterios', [InspeccionController::class, 'getInspeccionCriterios']);
    Route::post('inspeccion/crearInspeccionCriterio', [InspeccionController::class, 'crearInspeccionCriterio']);
    Route::post('inspeccion/actualizarInspeccionCriterio', [InspeccionController::class, 'actualizarInspeccionCriterio']);
    Route::post('inspeccion/eliminarInspeccionCriterio', [InspeccionController::class, 'eliminarInspeccionCriterio']);
    Route::post('inspeccion/getInspeccionInspectores', [InspeccionController::class, 'getInspeccionInspectores']);
    Route::post('inspeccion/crearInspeccionInspector', [InspeccionController::class, 'crearInspeccionInspector']);
    Route::post('inspeccion/actualizarInspeccionInspector', [InspeccionController::class, 'actualizarInspeccionInspector']);
    Route::post('inspeccion/eliminarInspeccionInspector', [InspeccionController::class, 'eliminarInspeccionInspector']);
    Route::post('inspeccion/getInspeccionObservadores', [InspeccionController::class, 'getInspeccionObservadores']);
    Route::post('inspeccion/crearInspeccionObservador', [InspeccionController::class, 'crearInspeccionObservador']);
    Route::post('inspeccion/actualizarInspeccionObservador', [InspeccionController::class, 'actualizarInspeccionObservador']);
    Route::post('inspeccion/eliminarInspeccionObservador', [InspeccionController::class, 'eliminarInspeccionObservador']);
    Route::post('inspeccion/getInspeccionParticulares', [InspeccionController::class, 'getInspeccionParticulares']);
    Route::post('inspeccion/crearInspeccionParticular', [InspeccionController::class, 'crearInspeccionParticular']);
    Route::post('inspeccion/actualizarInspeccionParticular', [InspeccionController::class, 'actualizarInspeccionParticular']);
    Route::post('inspeccion/eliminarInspeccionParticular', [InspeccionController::class, 'eliminarInspeccionParticular']);
    Route::post('inspeccion/getInspeccionTecnicos', [InspeccionController::class, 'getInspeccionTecnicos']);
    Route::post('inspeccion/crearInspeccionTecnico', [InspeccionController::class, 'crearInspeccionTecnico']);
    Route::post('inspeccion/actualizarInspeccionTecnico', [InspeccionController::class, 'actualizarInspeccionTecnico']);
    Route::post('inspeccion/eliminarInspeccionTecnico', [InspeccionController::class, 'eliminarInspeccionTecnico']);

    // Plan inspeccion
    Route::post('inspeccion/getPlanInspecciones', [InspeccionController::class, 'getPlanesInspecciones']);
    Route::get('inspeccion/getProcesosSubprocesos', [InspeccionController::class, 'getProcesosSubProcesos']);
    
    Route::get('inspeccion/getCriterios', [InspeccionController::class, 'getCriterios']);
    Route::get('inspeccion/getFuncionarios', [InspeccionController::class, 'getFuncionarios']);
    Route::get('inspeccion/getResponsables', [InspeccionController::class, 'getResponsables']);
    Route::get('inspeccion/getTipoInspeccion', [InspeccionController::class, 'getTipoInspeccion']);
    Route::post('inspeccion/crearPlanInspeccion', [InspeccionController::class, 'crearPlanInspeccion']);
    Route::post('inspeccion/actualizarPlanInspeccion', [InspeccionController::class, 'actualizarPlanInspeccion']);

    // Actividad Plan Inspeccion
    Route::post('inspeccion/getActividadesPlanInspeccion', [InspeccionController::class, 'getActividadesPlanInspeccion']);
    Route::post('inspeccion/crearActividadPlanInspeccion', [InspeccionController::class, 'crearActividadPlanInspeccion']);
    Route::post('inspeccion/actualizarActividadPlanInspeccion', [InspeccionController::class, 'actualizarActividadPlanInspeccion']);

    // Anotaciones
    Route::get('anotacion/getAnotaciones', [AnotacionController::class, 'getAnotaciones']);
    Route::get('anotacion/getDependenciasLDAP', [AnotacionController::class, 'getDependenciasLDAP']);
    Route::get('anotacion/getUsersLDAP', [AnotacionController::class, 'getUsersLDAP']);
    Route::get('anotacion/getTipoAnotacion', [AnotacionController::class, 'getTipoAnotacion']);
    Route::get('anotacion/getTemaCatalogacion', [AnotacionController::class, 'getTemaCatalogacion']);
    Route::get('anotacion/getProcesosInternos', [AnotacionController::class, 'getProcesosInternos']);
    Route::get('anotacion/getFuenteAnotacion', [AnotacionController::class, 'getFuenteAnotacion']);
    Route::get('anotacion/getProgramaCalidad', [AnotacionController::class, 'getProgramaCalidad']);
    Route::get('anotacion/getCriticidadAnotacion', [AnotacionController::class, 'getCriticidadAnotacion']);
    Route::get('anotacion/getClaseAnotacion', [AnotacionController::class, 'getClaseAnotacion']);
    Route::get('anotacion/getInspecciones', [AnotacionController::class, 'getInspecciones']);
    Route::post('anotacion/getConsecutivoHallazgo', [AnotacionController::class, 'getConsecutivoHallazgo']);
    Route::post('anotacion/getCriteriosInspeccion', [AnotacionController::class, 'getCriteriosInspeccion']);
    Route::post('anotacion/crearAnotacion', [AnotacionController::class, 'crearAnotacion']);
    Route::post('anotacion/actualizarAnotacion', [AnotacionController::class, 'actualizarAnotacion']);
    Route::post('anotacion/crearAnotacionCorreccion', [AnotacionController::class, 'crearAnotacionCorreccion']);
    Route::post('anotacion/actualizarAnotacionCorreccion', [AnotacionController::class, 'actualizarAnotacionCorrecion']);
    Route::post('anotacion/crearAnotacionMejoramiento', [AnotacionController::class, 'crearAnotacionMejoramiento']);
    Route::post('anotacion/actualizarAnotacionMejoramiento', [AnotacionController::class, 'actualizarAnotacionMejoramiento']);
    Route::post('anotacion/crearAnotacionOrden', [AnotacionController::class, 'crearAnotacionOrden']);
    Route::post('anotacion/actualizarAnotacionOrden', [AnotacionController::class, 'actualizarAnotacionOrden']);
});