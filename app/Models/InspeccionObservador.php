<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InspeccionObservador extends Model
{
    use HasFactory;

    protected $table = 'sg_insp_observadores';

    protected $primaryKey = 'observador_id';

    public $timestamps = false;

    public function getInspeccionObservadores(Request $request) {
        $db = \DB::select('select * from vw_informe_inspeccion_observadores where inspeccion_id = :id order by 1', array('id' => $request->get('inspeccion_id')));

        return $db;
    }

    public function crud_insp_observadores(Request $request, $evento) {
        if ($evento == 'C') {
            $m = new InspeccionObservador;
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->usuario_id = $request->get('usuario_id');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = InspeccionObservador::find($request->get('observador_id'));
            $m->inspeccion_id = $request->get('inspeccion_id');
            $m->usuario_id = $request->get('usuario_id');
            $m->save();

            return $m;
        }
    }
}
