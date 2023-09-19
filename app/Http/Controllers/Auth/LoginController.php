<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\UsuarioMenu;

class LoginController extends Controller
{
    public function login(Request $request) {
        $opc = 0;

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $user = Auth::user();

            if ($user->activo == 1) {
                $m_menu = new Menu;
                $m_usuariomenu = new UsuarioMenu;

                if (\DB::select('select * from vw_sg_adm_usuarios_roles_privilegios where usuario_id = :id', array('id' => $user->usuario_id)) != null) {
                    $opc = 1;
                }
                else {
                    $opc = 2;
                }

                $data = array();
                $data['usuario_id'] = $user->usuario_id;
                $data['usuario'] = $user->usuario;
                $data['nombre_completo'] = $user->nombre_completo;
                $data['email'] = strtolower($user->email);
                $data['es_empresa'] = $user->empresa_id != null ? 1 : 0;
                $data['menus'] = $m_menu->get_menu_id($m_usuariomenu->getUsuarioMenu($user->usuario_id, $opc));

                $response = json_encode(array('result' => $data), JSON_NUMERIC_CHECK);
                $response = json_decode($response);
                return response()->json(array('user' => $response, 'tipo' => 0));
            }
            else {
                return response()->json(array('mensaje' => "El usuario '" . $user->usuario . "' no se encuentra activo.", 'tipo' => -1));
            }
        }
        else {
            return response()->json(array('mensaje' => 'Estas credenciales no coinciden con nuestros registros.', 'tipo' => -1));
        }
    }

    public function logout() {
        Auth::logout();
    }
}
