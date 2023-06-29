<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Inspeccion;
use App\Models\AnotacionArchivo;

class Anotacion extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos';

    protected $primaryKey = 'hallazgo_id';

    public $timestamps = false;

    protected $casts = ['modelo' => 'json' ];

    public function crud_anotaciones(Request $request, $evento) {
        $obj = json_decode($request->modelo, true);

        if ($evento == 'C') {
            $a = new Anotacion;
            $a->inspeccion_id = $obj['inspeccion_id'];
            $a->codificacion = $obj['codificacion'];
            $a->tipo_hallazgo_id = $obj['tipo_hallazgo_id'];
            $a->tema_catalogacion_id = $obj['tema_catalogacion_id'];
            $a->fecha = $obj['fecha'];
            $a->criterio_id = $obj['criterio_id'];
            $a->descripcion_evidencia = $obj['descripcion_evidencia'];
            $a->usuario_creador = $obj['usuario'];
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();
            
            if ($request->file('archivo')) {
                $file = $request->file('archivo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $fileName);

                if ($a->hallazgo_id != 0) {
                    $m = new AnotacionArchivo;
                    $m->guardarArchivo($obj['hallazgo_id'], $fileName, $obj['usuario']);
                }
            }

            return $a;
        }
        else if ($evento == 'U') {
            $a = Anotacion::find($obj['hallazgo_id']);
            $a->inspeccion_id = $obj['inspeccion_id'];
            $a->codificacion = $obj['codificacion'];
            $a->tipo_hallazgo_id = $obj['tipo_hallazgo_id'];
            $a->tema_catalogacion_id = $obj['tema_catalogacion_id'];
            $a->fecha = $obj['fecha'];
            $a->criterio_id = $obj['criterio_id'];
            $a->descripcion_evidencia = $obj['descripcion_evidencia'];
            $a->usuario_modificador = $obj['usuario'];
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();
            
            if ($request->file('archivo')) {
                $file = $request->file('archivo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $fileName);

                if ($a->hallazgo_id != 0) {
                    $m = new AnotacionArchivo;
                    $m->guardarArchivo($obj['hallazgo_id'], $fileName, $obj['usuario']);
                }
            }

            return $a;
        }
    }

    public function getAnotaciones() {
        $db = \DB::select('select * from vw_anotaciones order by 1');

        return $db;
    }

    public function getTipoAnotacion() {
        $db = \DB::select('select * from vw_tipo_hallazgo');

        return $db;
    }

    public function getTemaCatalogacion() {
        $db = \DB::select('select * from vw_tema_catalogacion');

        return $db;
    }

    public function getProcesosInternos() {
        $db = \DB::select('select * from vw_procesos_internos');

        return $db;
    }

    public function getFuenteAnotacion() {
        $db = \DB::select('select * from vw_fuente_anotacion');

        return $db;
    }

    public function getProgramaCalidad() {
        $db = \DB::select('select * from vw_programa_calidad');

        return $db;
    }

    public function getCriticidadAnotacion() {
        $db = \DB::select('select * from vw_criticidad_anotacion');

        return $db;
    }

    public function getClaseAnotacion() {
        $db = \DB::select('select * from vw_clase_anotacion');

        return $db;
    }

    public function getCriteriosInspeccion(Request $request) {
        $db = \DB::select('exec pr_get_criterios_inspeccion ?',
                          [
                            $request->get('inspeccion_id')
                          ]);
        
        return $db;
    }

    public function getConsecutivoHallazgo(Request $request) {
        $db = \DB::select('exec pr_get_consecutivo_hallazgo ?',
                         [
                            $request->get('inspeccion_id')
                         ]);
        
        return $db;
    }
}
