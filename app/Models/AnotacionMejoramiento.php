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
        $db = AnotacionMejoramiento::join('AU_Reg_DependenciasLDAP', 'sg_adm_hallazgos_mejoramiento.responsable_id', '=', 'AU_Reg_DependenciasLDAP.IdDependencia')
                ->select('sg_adm_hallazgos_mejoramiento.mejoramiento_id',
                         'sg_adm_hallazgos_mejoramiento.hallazgo_id',
                         'sg_adm_hallazgos_mejoramiento.responsable_id',
                         'AU_Reg_DependenciasLDAP.Nombre as responsable')
                ->where('sg_adm_hallazgos_mejoramiento.hallazgo_id', '=', $request->get('hallazgo_id'))
                ->get();
        
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
