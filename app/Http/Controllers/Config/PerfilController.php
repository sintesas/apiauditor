<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\User;

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

            $usuario = User::find($request->get('id'));

            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->password = $securePass;
            $usuario->updated_at = \DB::raw('GETDATE()');
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

            $usuario = User::where('email', $email)->firstOrFail();
            $name = $usuario->name;
            $usuario->name = $name;
            $usuario->email = $email;
            $usuario->password = $securePass;
            $usuario->updated_at = \DB::raw('GETDATE()');
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
