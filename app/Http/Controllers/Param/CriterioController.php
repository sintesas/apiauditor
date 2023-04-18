<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CriteriosAuditorias;

class CriterioController extends Controller
{
    public function getCriterios() {
        $datos = CriteriosAuditorias::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
