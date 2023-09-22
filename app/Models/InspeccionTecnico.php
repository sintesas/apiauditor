<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InspeccionTecnico extends Model
{
    use HasFactory;

    protected $table = 'sg_insp_experto_tecnico';

    protected $primaryKey = 'experto_tecnico_id';

    public $timestamps = false;

    public function getInspeccionTecnicos(Request $request) {
        $db = \DB::select('select * from vw_informe_inspeccion_experto_tecnico where inspeccion_id = :id order by 1', array('id' => $request->get('inspeccion_id')));

        return $db;
    }

    public function crud_insp_tecnicos(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new InspeccionTecnico;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->grado_id = $request->get('grado_id');
            $m->usuario_creador = $request->get('usuario');
            $m->fecha_creacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = InspeccionTecnico::find($request->get('experto_tecnico_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->proceso_id = $request->get('proceso_id');
            $m->grado_id = $request->get('grado_id');
            $m->usuario_modificador = $request->get('usuario');
            $m->fecha_modificacion = \DB::raw("GETDATE()");
            $m->save();

            return $m;
        }
    }
}
