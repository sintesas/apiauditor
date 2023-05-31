<?php

namespace App\Http\Controllers\Inspec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Auditoria;
use App\Models\Inspeccion;
use App\Models\PlanInspeccion;
use App\Models\ActividadPlanInspeccion;
use App\Models\UsersLDAP;
use App\Models\InspeccionInspector;
use App\Models\InspeccionObservador;
use App\Models\InspeccionParticular;
use App\Models\InspeccionTecnico;

class InspeccionController extends Controller
{
    public function getInspecciones() {
        // $m = new Auditoria;
        // $datos = $m->getAuditorias();
        $datos = \DB::select("select * from vw_inspecciones order by 1");

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getUnidadDependencias() {
        $datos = \DB::select("select * from vw_unidades_dependencias order by 1");

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

    public function getFuncionarios() {
        $m = new UsersLDAP;
        $datos = $m->getFuncionarios();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getResponsables() {
        $m = new UsersLDAP;
        $datos = $m->getResponsables();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCriterios() {
        $datos = \DB::select('select * from vw_criterios order by 1');

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTipoInspeccion() {
        $datos = \DB::select('select * from vw_tipo_inspeccion order by 1');

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearInspeccion(Request $request) {
        $m = new Inspeccion;
        $in = $m->crud_inspecciones($request, 'C');

        if ($in->inspeccion_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $in->inspeccion_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarInspeccion(Request $request) {
        $m = new Inspeccion;
        $in = $m->crud_inspecciones($request, 'U');

        if ($in) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getInspeccionInspectores(Request $request) {
        $m = new InspeccionInspector;
        $datos = $m->getInspeccionInspectores($request);
        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearInspeccionInspector(Request $request) {
        $m = new InspeccionInspector;
        $in = $m->crud_insp_inspectores($request, 'C');

        if ($in->equipo_inspector_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $in->equipo_inspector_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarInspeccionInspector(Request $request) {
        $m = new InspeccionInspector;
        $in = $m->crud_insp_inspectores($request, 'U');

        if ($in) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getInspeccionObservadores(Request $request) {
        $m = new InspeccionObservador;
        $datos = $m->getInspeccionObservadores($request);
        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearInspeccionObservador(Request $request) {
        $m = new InspeccionObservador;
        $in = $m->crud_insp_observadores($request, 'C');

        if ($in->observador_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $in->observador_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarInspeccionObservador(Request $request) {
        $m = new InspeccionObservador;
        $in = $m->crud_insp_observadores($request, 'U');

        if ($in) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getInspeccionParticulares(Request $request) {
        $m = new InspeccionParticular;
        $datos = $m->getInspeccionParticulares($request);
        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearInspeccionParticular(Request $request) {
        $m = new InspeccionParticular;
        $in = $m->crud_insp_particulares($request, 'C');

        if ($in->criterio_particular_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $in->criterio_particular_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarInspeccionParticular(Request $request) {
        $m = new InspeccionParticular;
        $in = $m->crud_insp_particulares($request, 'U');

        if ($in) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getInspeccionTecnicos(Request $request) {
        $m = new InspeccionTecnico;
        $datos = $m->getInspeccionTecnicos($request);
        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearInspeccionTecnico(Request $request) {
        $m = new InspeccionTecnico;
        $in = $m->crud_insp_tecnicos($request, 'C');

        if ($in->equipo_tecnico_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $in->equipo_tecnico_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarInspeccionTecnico(Request $request) {
        $m = new InspeccionTecnico;
        $in = $m->crud_insp_tecnicos($request, 'U');

        if ($in) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getPlanesInspecciones(Request $request) {
        $m = new PlanInspeccion;
        $datos = $m->getPlanesInspecciones($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearPlanInspeccion(Request $request) {
        $m = new PlanInspeccion;
        $pl = $m->crud_plan_inspecciones($request, 'C');

        if ($pl->plan_inspeccion_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $pl->plan_inspeccion_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarPlanInspeccion(Request $request) {
        $m = new PlanInspeccion;
        $pl = $m->crud_plan_inspecciones($request, 'U');

        if ($pl) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function getActividadesPlanInspeccion(Request $request) {
        $m = new ActividadPlanInspeccion;
        $datos = $m->getActividadesPlanInspeccion($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}