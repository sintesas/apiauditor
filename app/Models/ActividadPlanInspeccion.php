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
    
    public function getProcesosSubProcesos() {
        $db = \DB::select('select p.* from vw_procesos_subprocesos p order by p.proceso');

        return $db;
    }
}
