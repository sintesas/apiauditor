<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function getRoles(Request $request) {
        $rol = new Rol;
        $datos = $rol->get_roles_by_user($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function changePassword(Request $request) {
        try {
            $pass = $request->get('password');

            $options = [
                'cost' => 15,
            ];

            $securePass = password_hash($pass, PASSWORD_BCRYPT, $options);

            $usuario = Usuario::find($request->get('usuario_id'));

            $usuario->nombre_completo = $request->get('nombre_completo');
            $usuario->email = $request->get('email');
            $usuario->password = $securePass;
            $usuario->usuario_modificador = $request->get('usuario');
            $usuario->fecha_modificacion = \DB::raw('GETDATE()');
            $usuario->save();

            $response = json_encode(array('mensaje' => 'Usuario actualizado.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        catch (\Exception $e) {
            return response()->json(array('mensaje' => 'Error: ' . $e, 'tipo' => -1));
        }
    }

    public function resetPassword(Request $request) {
        try {
            $email = base64_decode($request->get('q'));
            $pass = $request->get('password');            

            $options = [
                'cost' => 15,
            ];

            $securePass = password_hash($pass, PASSWORD_BCRYPT, $options);

            $usuario = Usuario::where('email', $email)->firstOrFail();
            $nombre_completo = $usuario->nombre_completo;
            $usuario->nombre_completo = $nombre_completo;
            $usuario->email = $email;
            $usuario->password = $securePass;
            $usuario->usuario_modificador = $request->get('usuario');
            $usuario->fecha_modificacion = \DB::raw('GETDATE()');
            $usuario->save();

            $response = json_encode(array('mensaje' => 'Ha reestablecido la contreseña', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        catch (\Exception $e) {
            return response()->json(array('mensaje' => 'Error: ' . $e, 'tipo' => -1));
        }
    }
}
