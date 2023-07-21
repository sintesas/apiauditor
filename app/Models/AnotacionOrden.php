<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionOrden extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_orden';

    protected $primaryKey = 'orden_id';

    public $timestamps = false;

    public function getAnotacionOrden(Request $request) {
        $db = \DB::select('select * from vw_adm_hallazgos_orden where hallazgo_id = :id', array('id' => $request->get('hallazgo_id')));
        
        return $db;
    }

    public function crud_anotaciones_orden(Request $request, $evento) {
        if ($evento == 'C') {
            $a = new AnotacionOrden;
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_creador = $request->get('usuario');
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
        else if ($evento == 'U') {
            $a = AnotacionOrden::find($request->get('orden_id'));
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_modificador = $request->get('usuario');
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
    }
}
