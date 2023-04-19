<?php

namespace App\Http\Controllers\Unidad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Empresa;

class UnidadController extends Controller
{
    public function getEmpresasActivos() {
        $datos = Empresa::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
