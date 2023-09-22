<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\SeguimientoArchivo;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_seguimiento';

    protected $primaryKey = 'seguimiento_id';

    public $timestamps = false;

    protected $casts = ['modelo' => 'json' ];

    public function getSeguimientos() {
        $db = \DB::select('select * from vw_seguimiento order by 1');

        return $db;
    }

    public function getExportSeguimientos() {
        $db = \DB::select('select * from vw_export_seguimiento order by 1');

        return $db;
    }

    public function crud_seguimientos(Request $request, $evento) {
        $obj = json_decode($request->modelo, true);
        \Log::info($obj);

        if ($evento == 'C') {
            $s = new Seguimiento;
            $s->inspeccion_id = $obj['inspeccion_id'];
            $s->fecha_concepto = $obj['fecha_concepto'];
            $s->concepto_efectividad_id = $obj['concepto_efectividad_id'] == 0 ? null : $obj['concepto_efectividad_id'];
            $s->hallazgo_id = $obj['hallazgo_id'];
            $s->hallazgo_causa_raiz_id = $obj['hallazgo_causa_raiz_id'] == 0 ? null : $obj['hallazgo_causa_raiz_id'];
            $s->hallazgo_actividad_id = $obj['hallazgo_actividad_id'] == 0 ? null : $obj['hallazgo_actividad_id'];
            $s->seguimiento = $obj['seguimiento'];
            $s->fecha_seguimiento = $obj['fecha_seguimiento'];
            $s->tema_catalogacion_id = $obj['tema_catalogacion_id'] == 0 ? null : $obj['tema_catalogacion_id'];
            $s->responsable_id = $obj['responsable_id'] == 0 ? null : $obj['responsable_id'];
            $s->porcentaje = $obj['porcentaje'];
            $s->usuario_creador = $obj['usuario'];
            $s->fecha_creacion = \DB::raw('GETDATE()');
            $s->save();

            if ($request->file('archivo')) {
                $folderPath = public_path() . '/files/seguim';

                if (!\File::exists($folderPath)) {
                    \File::makeDirectory($folderPath, 0755, true);
                }

                $file = $request->file('archivo');
                $uuid = Str::uuid();

                if ($s->seguimiento_id != 0) {
                    $fileName = 'sgm_' . $uuid . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('files/seguim'), $fileName);

                    $m = new SeguimientoArchivo;
                    $m->guardarArchivo($obj['seguimiento_id'], $fileName, $obj['usuario']);
                }
            }

            return $s;
        }
        else if ($evento == 'U') {
            $s = Seguimiento::find($obj['seguimiento_id']);
            $s->inspeccion_id = $obj['inspeccion_id'];
            $s->fecha_concepto = $obj['fecha_concepto'];
            $s->concepto_efectividad_id = $obj['concepto_efectividad_id'] == 0 ? null : $obj['concepto_efectividad_id'];
            $s->hallazgo_id = $obj['hallazgo_id'];
            $s->hallazgo_causa_raiz_id = $obj['hallazgo_causa_raiz_id'] == 0 ? null : $obj['hallazgo_causa_raiz_id'];
            $s->hallazgo_actividad_id = $obj['hallazgo_actividad_id'] == 0 ? null : $obj['hallazgo_actividad_id'];
            $s->seguimiento = $obj['seguimiento'];
            $s->fecha_seguimiento = $obj['fecha_seguimiento'];
            $s->tema_catalogacion_id = $obj['tema_catalogacion_id'] == 0 ? null : $obj['tema_catalogacion_id'];
            $s->responsable_id = $obj['responsable_id'] == 0 ? null : $obj['responsable_id'];
            $s->porcentaje = $obj['porcentaje'];
            $s->usuario_creador = $obj['usuario'];
            $s->fecha_creacion = \DB::raw('GETDATE()');
            $s->save();

            if ($request->file('archivo')) {
                $folderPath = public_path() . '/files/seguim';

                if (!\File::exists($folderPath)) {
                    \File::makeDirectory($folderPath, 0755, true);
                }

                $file = $request->file('archivo');

                $uuid = Str::uuid();

                if ($s->seguimiento_id != 0) {
                    $fileName = 'sgm_' . $uuid . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('files/seguim'), $fileName);

                    $m = new SeguimientoArchivo;
                    $m->guardarArchivo($obj['seguimiento_id'], $fileName, $obj['usuario']);
                }
            }

            return $s;
        }
    }
}
