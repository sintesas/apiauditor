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
        $db = AnotacionOrden::join('AU_Reg_DependenciasLDAP', 'sg_adm_hallazgos_orden.responsable_id', '=', 'AU_Reg_DependenciasLDAP.IdDependencia')
                ->select('sg_adm_hallazgos_orden.orden_id',
                         'sg_adm_hallazgos_orden.hallazgo_id',
                         'sg_adm_hallazgos_orden.responsable_id',
                         'AU_Reg_DependenciasLDAP.Nombre as responsable')
                ->where('sg_adm_hallazgos_orden.hallazgo_id', '=', $request->get('hallazgo_id'))
                ->get();
        
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
