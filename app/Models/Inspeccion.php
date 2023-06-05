<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Inspeccion extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_inspecciones';

    protected $primaryKey = 'inspeccion_id';

    public $timestamps = false;

    public function crud_inspecciones(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new Inspeccion;
            $m->nombre_inspeccion = $request->get('nombre_inspeccion');
            $m->codigo = $request->get('codigo');
            $m->fecha_inicio_inspec = \DB::raw('GETDATE()');
            $m->unidad_id = $request->get('unidad_id');
            $m->dependencia = $request->get('dependencia');
            $m->aspecto = $request->get('aspecto');
            $m->responsable_id = $request->get('responsable_id');
            $m->cargo_resp = $request->get('cargo_resp');
            $m->insp_general_id = $request->get('insp_general_id');
            $m->inspector_lider_id = $request->get('inspector_lider_id');
            $m->objetivo = $request->get('objetivo');
            $m->alcance = $request->get('alcance');
            $m->tipo_inspeccion_id = $request->get('tipo_inspeccion_id');
            // $m->criterio_id = $request->get('criterio_id');
            $m->fecha_inicio = $request->get('fecha_inicio');
            $m->hora_inicio = $request->get('hora_inicio');
            $m->fecha_termino = $request->get('fecha_cierre');
            $m->hora_termino = $request->get('hora_termino');
            $m->observaciones = $request->get('observaciones');
            $m->activo = 1;
            $m->usuario_creador = $request->get('usuario');
            $m->fecha_creacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = Inspeccion::find($request->get('inspeccion_id'));
            $m->nombre_inspeccion = $request->get('nombre_inspeccion');
            $m->codigo = $request->get('codigo');
            $m->fecha_inicio_inspec = $request->get('fecha_inicio_inspec');
            $m->unidad_id = $request->get('unidad_id');
            $m->dependencia = $request->get('dependencia');
            $m->aspecto = $request->get('aspecto');
            $m->responsable_id = $request->get('responsable_id');
            $m->cargo_resp = $request->get('cargo_resp');
            $m->insp_general_id = $request->get('insp_general_id');
            $m->inspector_lider_id = $request->get('inspector_lider_id');
            $m->objetivo = $request->get('objetivo');
            $m->alcance = $request->get('alcance');
            $m->tipo_inspeccion_id = $request->get('tipo_inspeccion_id');
            // $m->criterio_id = $request->get('criterio_id');
            $m->fecha_inicio = $request->get('fecha_inicio');
            $m->hora_inicio = $request->get('hora_inicio');
            $m->fecha_termino = $request->get('fecha_cierre');
            $m->hora_termino = $request->get('hora_termino');
            $m->observaciones = $request->get('observaciones');
            $m->activo = 1;
            $m->usuario_modificador = $request->get('usuario');
            $m->fecha_modificacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
    }
}
