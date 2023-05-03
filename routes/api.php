<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UnidadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Config\PerfilController;
use App\Http\Controllers\Param\CriterioController;
use App\Http\Controllers\Param\ListaController;
use App\Http\Controllers\Param\ProcesoController;
use App\Http\Controllers\Param\TipoAuditoriaController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [LoginController::class, 'login']);
Route::any('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('personas', [UserController::class, 'getPersonas']);
    // Route::get('personasActivos', [UserController::class, 'getPersonasActivos']);
    Route::get('tipodocumentos', [UserController::class, 'getTipoDocumento']);
    // Route::get('areas', [UserController::class, 'getAreasExperiencia']);
    // Route::get('carreraspro', [UserController::class, 'getCarrerasProfesiones']);
    // Route::get('cargos', [UserController::class, 'getCargos']);
    // Route::get('cuerpos', [UserController::class, 'getCuerpos']);
    // Route::get('empresas', [UserController::class, 'getEmpresas']);
    // Route::get('escuadrones', [UserController::class, 'getEscuadrones']);
    // Route::get('especialidadcert', [UserController::class, 'getEspecialidadCertificacion']);
    // Route::get('especialidades', [UserController::class, 'getEspecialidades']);
    // Route::get('fuerzas', [UserController::class, 'getFuerzas']);
    // Route::get('grados', [UserController::class, 'getGrados']);
    // Route::get('grupos', [UserController::class, 'getGrupos']);
    // Route::get('nivelcomp', [UserController::class, 'getNivelCompetencia']);
    // Route::get('procesos', [UserController::class, 'getProcesos']);
    // Route::get('talleres', [UserController::class, 'getTalleres']);
    // Route::get('unidades', [UserController::class, 'getUnidades']);
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

    Route::get('roles', [RolController::class, 'getRoles']);
    Route::post('rol/crearRol', [RolController::class, 'crearRol']);
    Route::post('rol/actualizarRol', [RolController::class, 'actualizarRol']);
    Route::get('rol/getRolesActivos', [RolController::class, 'getRolesActivos']);
    Route::get('rol/getModulos', [RolController::class, 'getModulos']);
    Route::post('rol/crearRolPrivilegios', [RolController::class, 'crearRolPrivilegios']);
    Route::post('rol/actualizarRolPrivilegios', [RolController::class, 'actualizarRolPrivilegios']);
    Route::post('rol/getRolPrivilegiosById', [RolController::class, 'getRolPrivilegiosById']);
    Route::post('rol/eliminarRolPrivilegiosById', [RolController::class, 'eliminarRolPrivilegiosById']);

    //unidades
    Route::get('unidades', [UnidadController::class, 'getUnidades']);
    Route::post('unidad/crearUnidades', [UnidadController::class, 'crearUnidades']);
    Route::post('unidad/actualizarUnidades', [UnidadController::class, 'actualizarUnidad']);
    Route::post('unidad/obtenerUnidadesByid', [UnidadController::class, 'getUnidadesById']);
});

Route::group(['prefix' => 'param'], function() {
    Route::get('criterios', [CriterioController::class, 'getCriterios']);
    Route::get('procesos', [ProcesoController::class, 'getProcesos']);
    Route::get('tipoauditoria', [TipoAuditoriaController::class, 'getTipoAuditorias']);

    Route::get('listas', [ListaController::class,'getListas']);
    Route::post('lista/crearLista', [ListaController::class, 'crearLista']);
    Route::post('lista/actualizarLista', [ListaController::class, 'actualizarLista']);
    Route::post('lista/getListasById', [ListaController::class, 'getListasId']);
    Route::get('lista/getListaDetalleFull', [ListaController::class, 'getListaDetalleFull']);
    Route::post('lista/crearListaDetalle', [ListaController::class, 'crearListaDetalle']);
    Route::post('lista/actualizarListaDetalle', [ListaController::class, 'actualizarListaDetalle']);
});

Route::group(['prefix' => 'config'], function() {
    Route::post('roles', [PerfilController::class, 'getRoles']);
    Route::post('changePassword', [PerfilController::class, 'changePassword']);
    Route::post('resetPassword', [PerfilController::class, 'resetPassword']);
});

Route::post('enviar', [MailController::class, 'index']);
