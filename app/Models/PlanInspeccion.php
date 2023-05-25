<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PlanInspeccion extends Model
{
    use HasFactory;

    protected $table = 'PlanesInspeccion';

    protected $primaryKey = 'IdPlanInspeccion';

    public $timestamps = false;

    public function getPlanesInspecciones(Request $request) {
        $db = \DB::select('select * from vw_plan_inspecciones p where idauditoria = :id order by p.codigo,p.inspeccionado', array('id' => $request->get('id')));

        return $db;
    }
}
