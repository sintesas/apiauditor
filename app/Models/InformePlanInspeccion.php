<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformePlanInspeccion extends Model
{
    use HasFactory;

    public function getInspecciones($id) {
        $db = \DB::select('select * from vw_informe_inspecciones where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getInspeccionCriteriosGeneral($id) {
        $db = \DB::select('select * from vw_informe_inspeccion_criterios_general where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getInspeccionCriteriosParticular($id) {
        $db = \DB::select('select * from vw_informe_inspeccion_criterios_particular where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getInspeccionEquipoInspector($id) {
        $db = \DB::select('select * from vw_informe_inspeccion_equipo_inspector where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getInspeccionExpertoTecnico($id) {
        $db = \DB::select('select * from vw_informe_inspeccion_experto_tecnico where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getInspeccionObservadores($id) {
        $db = \DB::select('select * from vw_informe_inspeccion_observadores where inspeccion_id = :id', array('id' => $id));

        return $db;
    }

    public function getActividadesPlanInspeccion($id) {
        $db = \DB::select('select * from vw_informe_actividades_plan_inspecciones where inspeccion_id = :id', array('id' => $id));

        return $db;
    }
}
