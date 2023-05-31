<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InspeccionInspector extends Model
{
    use HasFactory;

    protected $table = 'sg_insp_equipo_inspector';

    protected $primaryKey = 'equipo_inspector_id';

    public $timestamps = false;

    public function getInspeccionInspectores(Request $request) {
        $db = \DB::select('select * from sg_insp_equipo_inspector where inspeccion_id = :id order by 1', array('id' => $request->get('inspeccion_id')));

        return $db;
    }

    public function crud_insp_inspectores(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new InspeccionInspector;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->procesos = $request->get('procesos');
            $m->grado_id = $request->get('grado_id');
            $m->grado = $request->get('grado');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = InspeccionInspector::find($request->get('equipo_inspector_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->procesos = $request->get('procesos');
            $m->grado_id = $request->get('grado_id');
            $m->grado = $request->get('grado');
            $m->save();

            return $m;
        }
    }
}
