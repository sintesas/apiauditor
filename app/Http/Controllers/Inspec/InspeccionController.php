<?php

namespace App\Http\Controllers\Inspec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Auditoria;
use App\Models\PlanInspeccion;
use App\Models\ActividadPlanInspeccion;

class InspeccionController extends Controller
{
    public function getInspecciones() {
        $m = new Auditoria;
        $datos = $m->getAuditorias();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getPlanesInspecciones(Request $request) {
        $m = new PlanInspeccion;
        $datos = $m->getPlanesInspecciones($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getActividadesPlanInspeccion(Request $request) {
        $m = new ActividadPlanInspeccion;
        $datos = $m->getActividadesPlanInspeccion($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getProcesosSubProcesos() {
        $m = new ActividadPlanInspeccion;
        $datos = $m->getProcesosSubProcesos();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
