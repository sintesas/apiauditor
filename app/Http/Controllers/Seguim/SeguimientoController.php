<?php

namespace App\Http\Controllers\Seguim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anotacion;
use App\Models\AnotacionActividad;
use App\Models\AnotacionCausaRaiz;
use App\Models\Inspeccion;
use App\Models\Seguimiento;
use App\Models\SeguimientoArchivo;

class SeguimientoController extends Controller
{
    public function getSeguimientos() {
        $s = new Seguimiento;
        $datos = $s->getSeguimientos();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getInspecciones() {
        $m = new Inspeccion;
        $datos = $m->getInspecciones();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getAnotaciones() {
        $m = new Anotacion;
        $datos = $m->getAnotaciones();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getAnotacionCausaRaiz(Request $request) {
        $m = new AnotacionCausaRaiz;
        $datos = $m->getAnotacionCausaRaiz($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getAnotacionActividad(Request $request) {
        $m = new AnotacionActividad;
        $datos = $m->getAnotacionActividad($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTemaCatalogacion() {
        $m = new Anotacion;
        $datos = $m->getTemaCatalogacion();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getConceptoEfectividad() {
        $datos = \DB::select('select * from vw_concepto_efectividad order by 1');
        
        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getSeguimientoArchivo(Request $request) {
        $a = new SeguimientoArchivo;
        $datos = $a->getSeguimientoArchivo($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearSeguimientos(Request $request) {
        $m = new Seguimiento;
        $s = $m->crud_seguimientos($request, 'C');

        if ($s->seguimiento_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $s->seguimiento_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function actualizarSeguimientos(Request $request) {
        $m = new Seguimiento;
        $s = $m->crud_seguimientos($request, 'U');

        if ($s) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0, 'id' => $s->seguimiento_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function exportSeguimientos() {
        $m = new Seguimiento;
        $datos = $s->getExportSeguimientos();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

}
