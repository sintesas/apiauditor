<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Personal;
use App\Models\TipoDocumento;
use App\Models\CuerposFAC;
use App\Models\Grado;
use App\Models\Empresa;
use App\Models\CarrerasProfesiones;
use App\Models\Cargo;
use App\Models\Especialidades;
use App\Models\EspecialidadCertificacion;
use App\Models\NivelCompetencias;
use App\Models\AreasExperiencia;
use App\Models\Unidad;
use App\Models\Fuerza;
use App\Models\Talleres;
use App\Models\Grupos;
use App\Models\Escuadrones;
use App\Models\ProcesoAuditoria;
use App\Models\Permiso;
use App\Models\Rol;
use App\Models\User;
use App\Models\UsuarioMenu;
use App\Models\UsuarioRol;

class UserController extends Controller
{
    public function getPersonas() {
        $p = new Personal;
        $datos = $p->getPersonas();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getPersonasActivos() {
        $datos = Personal::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTipoDocumento() {
        $datos = TipoDocumento::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getAreasExperiencia() {
        $datos = AreasExperiencia::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCargos() {
        $datos = Cargo::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCarrerasProfesiones() {
        $datos = CarrerasProfesiones::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCuerpos() {
        $datos = CuerposFAC::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getEmpresas() {
        $datos = Empresa::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getEscuadrones() {
        $datos = Escuadrones::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getEspecialidadCertificacion() {
        $datos = EspecialidadCertificacion::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getEspecialidades() {
        $datos = Especialidades::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getFuerzas() {
        $datos = Fuerza::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getGrados() {
        $datos = Grado::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getGrupos() {
        $datos = Grupos::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getNivelCompetencia() {
        $datos = NivelCompetencias::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getProcesos() {
        $datos = ProcesoAuditoria::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTalleres() {
        $datos = Talleres::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getUnidades() {
        $datos = Unidad::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getUsers() {
        $datos = \DB::select("select * from users order by name");

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearPersonal(Request $request) {
        $model = new Personal;

        try {
            $db = $model->crud_personales($request, 'C');

            if ($db->IdPersonal != 0) {
                $id = $db->IdPersonal;

                $response = json_encode(array('mensaje' => 'Fue creado exitosamente.', 'tipo' => 0, 'id' => $id), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function actualizarPersonal(Request $request) {
        $model = new Personal;

        try {
            $db = $model->crud_personales($request, 'U');

            if ($db) {
                $response = json_encode(array('mensaje' => 'Fue actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function crearUsuario(Request $request) {
        $model = new User;

        try {
            $db = $model->crud_usuarios($request, 'C');

            if ($db->id != 0) {
                $id = $db->id;

                $response = json_encode(array('mensaje' => 'Fue creado exitosamente.', 'tipo' => 0, 'id' => $id), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function actualizarUsuario(Request $request) {
        $model = new User;

        try {
            $db = $model->crud_usuarios($request, 'U');

            if ($db) {
                $response = json_encode(array('mensaje' => 'Fue actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function getUsuariosRolesById(Request $request) {
        $model = new UsuarioRol;

        $datos = $model->get_usuarios_roles_by_usuario_id($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearUsuarioRol(Request $request) {
        $model = new UsuarioRol;

        try {
            $db = $model->crud_usuarios_roles($request, 'C');

            if ($db->usuario_rol_id != 0) {
                $id = $db->usuario_rol_id;

                $response = json_encode(array('mensaje' => 'Fue creado exitosamente.', 'tipo' => 0, 'id' => $id), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function actualizarUsuarioRol(Request $request) {
        $model = new UsuarioRol;

        try {
            $db = $model->crud_usuarios_roles($request, 'U');

            if ($db) {
                $response = json_encode(array('mensaje' => 'Fue actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function getRolPrivilegiosPantalla() {
        $model = new UsuarioRol;

        $datos = $model->get_rol_privilegios_pantalla();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearAsignarMenu(Request $request) {
        $m = new UsuarioMenu;
        $umenu = $m->crud_usuarios_menu($request);

        if ($umenu[0]->id != 0) {
            return response()->json(array('tipo' => 0, 'mensaje' => 'Fue creado exitosamente.', 'id' => $umenu[0]->id));
        }
        else {
            return response()->json(array('tipo' => -1, 'mensaje' => 'Error guardado'));
        }
    }

    public function eliminarUsuariosRolesId(Request $request) {
        $model = new UsuarioRol;

        try {
            $db = $model->eliminar_usuarios_roles_by_id($request);

            if ($db) {
                $response = json_encode(array('mensaje' => 'Fue eliminado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }

    public function getPersonalesActivos() {
        $datos = Personal::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getPermisos(Request $request) {
        $p = new Permiso;
        $permiso = $p->getPermisos($request);
        
        $datos = array();
        $datos['consultar'] = $permiso->consultar;
        $datos['crear'] = $permiso->crear;
        $datos['actualizar'] = $permiso->actualizar;
        $datos['eliminar'] = $permiso->eliminar;

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
