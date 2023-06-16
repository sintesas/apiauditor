<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PlanInspeccion extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_planes_inspecciones';

    protected $primaryKey = 'plan_inspeccion_id';

    public $timestamps = false;

    public function getPlanesInspecciones(Request $request) {
        $db = \DB::select('select * from sg_adm_planes_inspecciones p where inspeccion_id = :id', array('id' => $request->get('id')));

        return $db;
    }

    public function crud_plan_inspecciones(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new PlanInspeccion;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->codigo = $request->get('codigo');
            $m->fecha = \DB::raw('GETDATE()');
            $m->observaciones = $request->get('observaciones');
            $m->activo = 1;
            $m->usuario_creador = $request->get('usuario');
            $m->fecha_creacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = PlanInspeccion::find($request->get('inspeccion_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->codigo = $request->get('codigo');
            $m->fecha = \DB::raw('GETDATE()');
            $m->observaciones = $request->get('observaciones');
            $m->activo = 1;
            $m->usuario_modificador = $request->get('usuario');
            $m->fecha_modificacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
    }
}
