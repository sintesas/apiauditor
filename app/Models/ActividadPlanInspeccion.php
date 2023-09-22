<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActividadPlanInspeccion extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_actividades_plan_inspeccion';

    protected $primaryKey = 'actividad_plan_id';

    public $timestamps = false;

    public function getActividadesPlanInspeccion(Request $request) {
        $db = \DB::select ('select * from vw_actividades_plan_inspeccion where plan_inspeccion_id = :id order by 1', array('id' => $request->get('plan_inspeccion_id')));

        return $db;
    }

    public function crud_actividades_plan_inspeccion(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new ActividadPlanInspeccion;
            $m->plan_inspeccion_id = $request->get('plan_inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->actividades = $request->get('actividad');
            $m->inspeccionado_id = $request->get('inspeccionado_id');
            $m->inspector_id = $request->get('inspector_id');
            $m->fecha_inicio = $request->get('fecha_inicio');
            $m->hora_inicio = $request->get('hora_inicio');
            $m->fecha_cierre = $request->get('fecha_cierre');
            $m->hora_final = $request->get('hora_final');
            $m->activo = 1;
            $m->usuario_creador = $request->get('usuario');
            $m->fecha_creacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = ActividadPlanInspeccion::find($request->get('actividad_plan_id'));
            $m->plan_inspeccion_id = $request->get('plan_inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->actividades = $request->get('actividad');
            $m->inspeccionado_id = $request->get('inspeccionado_id');
            $m->inspector_id = $request->get('inspector_id');
            $m->fecha_inicio = $request->get('fecha_inicio');
            $m->hora_inicio = $request->get('hora_inicio');
            $m->fecha_cierre = $request->get('fecha_cierre');
            $m->hora_final = $request->get('hora_final');
            $m->activo = 1;
            $m->usuario_modificador = $request->get('usuario');
            $m->fecha_modificacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
    }
    
    public function getProcesosSubProcesos() {
        $db = \DB::select('select p.* from vw_procesos_subprocesos p order by p.proceso');

        return $db;
    }
}
