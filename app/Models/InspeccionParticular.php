<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InspeccionParticular extends Model
{
    use HasFactory;

    protected $table = 'sg_insp_criterio_particular';

    protected $primaryKey = 'criterio_particular_id';

    public $timestamps = false;

    public function getInspeccionParticulares(Request $request) {
        $db = \DB::select('select * from vw_informe_inspeccion_criterios_particular where inspeccion_id = :id order by 1', array('id' => $request->get('inspeccion_id')));

        return $db;
    }

    public function crud_insp_particulares(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new InspeccionParticular;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->criterio_id = $request->get('criterio_id');
            $m->criterio = $request->get('criterio');
            $m->proceso_id = $request->get('proceso_id');
            $m->procesos = $request->get('procesos');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = InspeccionParticular::find($request->get('criterio_particular_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->criterio_id = $request->get('criterio_id');
            $m->criterio = $request->get('criterio');
            $m->proceso_id = $request->get('proceso_id');
            $m->procesos = $request->get('procesos');
            $m->save();

            return $m;
        }
    }
}
