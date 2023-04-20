<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UsuarioMenu;
use App\Models\UsuarioRol;
use App\Models\Personal;
use App\Models\TipoDocumento;

class UserController extends Controller
{
    public function getPersonas() {
        $p = new Personal;
        $datos = $p->getPersonas();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTipoDocumentos() {
        $datos = TipoDocumento::all();

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

    public function crearUsuario(Request $request) {
        $model = new Users;

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
        $model = new Users;

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
}
