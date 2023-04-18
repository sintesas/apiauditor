<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Menu;
use App\Models\UsuarioMenu;

class LoginController extends Controller
{
    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $m_menu = new Menu;
            $m_usuariomenu = new UsuarioMenu;

            $data = array();
            $data['user_id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = strtolower($user->email);
            $data['usuario'] = substr(strtolower($user->email), 0, strpos(strtolower($user->email), "@"));
            $data['es_empresa'] = $user->IdEmpresa != null ? 1 : 0;
            $data['menus'] = $m_menu->get_menu_id($m_usuariomenu->getUsuarioMenu($user->id));

            $response = json_encode(array('result' => $data), JSON_NUMERIC_CHECK);
            $response = json_decode($response);
            return response()->json(array('user' => $response, 'tipo' => 0));
        }
        else {
            return response()->json(array('mensaje' => 'Estas credenciales no coinciden con nuestros registros.', 'tipo' => -1));
        }
    }

    public function logout() {
        Auth::logout();
    }
}
