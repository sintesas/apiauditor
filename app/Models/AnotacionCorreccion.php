<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionCorreccion extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_correccion';

    protected $primaryKey = 'correccion_id';

    public $timestamps = false;

    public function getAnotacionCorreccion(Request $request) {
        $db = AnotacionCorreccion::join('AU_Reg_DependenciasLDAP', 'sg_adm_hallazgos_correccion.responsable_id', '=', 'AU_Reg_DependenciasLDAP.IdDependencia')
                ->select('sg_adm_hallazgos_correccion.correccion_id',
                         'sg_adm_hallazgos_correccion.hallazgo_id',
                         'sg_adm_hallazgos_correccion.responsable_id',
                         'AU_Reg_DependenciasLDAP.Nombre as responsable')
                ->where('sg_adm_hallazgos_correccion.hallazgo_id', '=', $request->get('hallazgo_id'))
                ->get();
        
        return $db;
    }

    public function crud_anotaciones_correccion(Request $request, $evento) {
        if ($evento == 'C') {
            $a = new AnotacionCorreccion;
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_creador = $request->get('usuario');
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
        else if ($evento == 'U') {
            $a = AnotacionCorreccion::find($request->get('correccion_id'));
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_modificador = $request->get('usuario');
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
    }
}
