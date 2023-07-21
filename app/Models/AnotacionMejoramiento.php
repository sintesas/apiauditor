<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionMejoramiento extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_mejoramiento';

    protected $primaryKey = 'mejoramiento_id';

    public $timestamps = false;

    public function getAnotacionMejoramiento(Request $request) {
        $db = \DB::select('select * from vw_adm_hallazgos_mejoramiento where hallazgo_id = :id', array('id' => $request->get('hallazgo_id')));
        
        return $db;
    }

    public function crud_anotaciones_mejoramiento(Request $request, $evento) {
        if ($evento == 'C') {
            $a = new AnotacionMejoramiento;
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_creador = $request->get('usuario');
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
        else if ($evento == 'U') {
            $a = AnotacionMejoramiento::find($request->get('mejoramiento_id'));
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_modificador = $request->get('usuario');
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
    }
}
