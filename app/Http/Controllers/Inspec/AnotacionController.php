<?php

namespace App\Http\Controllers\Inspec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anotacion;
use App\Models\AnotacionCorreccion;
use App\Models\AnotacionMejoramiento;
use App\Models\AnotacionOrden;
use App\Models\Inspeccion;
use App\Models\DependenciasLDAP;
use App\Models\UsersLDAP;

class AnotacionController extends Controller
{
    public function getAnotaciones() {
        $m = new Anotacion;
        $datos = $m->getAnotaciones();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getDependenciasLDAP() {
        $datos = DependenciasLDAP::all();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getUsersLDAP() {
        $m = new UsersLDAP;
        $datos = $m->getUsersLDAP();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getTipoAnotacion() {
        $m = new Anotacion;
        $datos = $m->getTipoAnotacion();

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

    public function getProcesosInternos() {
        $m = new Anotacion;
        $datos = $m->getProcesosInternos();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getFuenteAnotacion() {
        $m = new Anotacion;
        $datos = $m->getFuenteAnotacion();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getProgramaCalidad() {
        $m = new Anotacion;
        $datos = $m->getProgramaCalidad();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCriticidadAnotacion() {
        $m = new Anotacion;
        $datos = $m->getCriticidadAnotacion();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getClaseAnotacion() {
        $m = new Anotacion;
        $datos = $m->getClaseAnotacion();

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

    public function getConsecutivoHallazgo(Request $request) {
        $m = new Anotacion;
        $datos = $m->getConsecutivoHallazgo($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function getCriteriosInspeccion(Request $request) {
        $m = new Anotacion;
        $datos = $m->getCriteriosInspeccion($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function crearAnotacion(Request $request) {
        $m = new Anotacion;
        $a = $m->crud_anotaciones($request, 'C');

        if ($a->hallazgo_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $a->hallazgo_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function actualizarAnotacion(Request $request) {
        $m = new Anotacion;
        $a = $m->crud_anotaciones($request, 'U');

        if ($a) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error actualizado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function crearAnotacionCorreccion(Request $request) {
        $m = new AnotacionCorreccion;
        $a = $m->crud_anotaciones_correccion($request, 'C');

        if ($a->correccion_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $a->correccion_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function actualizarAnotacionCorreccion(Request $request) {
        $m = new AnotacionCorreccion;
        $a = $m->crud_anotaciones_correccion($request, 'U');

        if ($a) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error actualizado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function crearAnotacionMejoramiento(Request $request) {
        $m = new AnotacionMejoramiento;
        $a = $m->crud_anotaciones_mejoramiento($request, 'C');

        if ($a->mejoramiento_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $a->mejoramiento_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function actualizarAnotacionMejoramiento(Request $request) {
        $m = new AnotacionMejoramiento;
        $a = $m->crud_anotaciones_mejoramiento($request, 'U');

        if ($a) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error actualizado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function crearAnotacionOrden(Request $request) {
        $m = new AnotacionOrden;
        $a = $m->crud_anotaciones_orden($request, 'C');

        if ($a->orden_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => $a->orden_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error guardado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }

    public function actualizarAnotacionOrden(Request $request) {
        $m = new AnotacionOrden;
        $a = $m->crud_anotaciones_orden($request, 'U');

        if ($a) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error actualizado', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response, 200);
        }
    }
}
