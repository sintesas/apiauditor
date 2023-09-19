<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InspeccionCriterio extends Model
{
    use HasFactory;

    protected $table = 'sg_insp_criterios';

    protected $primaryKey = 'insp_criterio_id';

    public $timestamps = false;

    public function getInspeccionCriterios(Request $request) {
        $db = \DB::select('select * from vw_informe_inspeccion_criterios_general where inspeccion_id = :id order by 1', array('id' => $request->get('inspeccion_id')));

        return $db;
    }

    public function crud_insp_criterios(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new InspeccionCriterio;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->criterio_id = $request->get('criterio_id');
            $m->criterio = $request->get('criterio');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = InspeccionCriterio::find($request->get('insp_criterio_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->criterio_id = $request->get('criterio_id');
            $m->criterio = $request->get('criterio');
            $m->save();

            return $m;
        }
    }
}
