<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionActividad extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_actividad';

    protected $primaryKey = 'hallazgo_actividad_id';

    public $timestamps = false;

    public function getAnotacionActividad(Request $request) {
        $db = AnotacionActividad::join('AU_Reg_usersLDAP', 'sg_adm_hallazgos_actividad.responsable_id', '=', 'AU_Reg_usersLDAP.IdUserLDAP')
                ->select('sg_adm_hallazgos_actividad.hallazgo_actividad_id',
                         'sg_adm_hallazgos_actividad.hallazgo_causa_raiz_id',
                         'sg_adm_hallazgos_actividad.descripcion',
                         'sg_adm_hallazgos_actividad.entregable',
                         'sg_adm_hallazgos_actividad.cantidad_entregable',
                         'sg_adm_hallazgos_actividad.fecha_inicio',
                         'sg_adm_hallazgos_actividad.fecha_termino',
                         'sg_adm_hallazgos_actividad.responsable_id',
                         'AU_Reg_usersLDAP.Name as responsable')
                ->where('sg_adm_hallazgos_actividad.hallazgo_causa_raiz_id', '=', $request->get('hallazgo_causa_raiz_id'))
                ->get();
        
        return $db;
    }

    public function crud_anotaciones_actividad(Request $request, $evento) {
        if ($evento == 'C') {
            $a = new AnotacionActividad;
            $a->hallazgo_causa_raiz_id = $request->get('hallazgo_causa_raiz_id');
            $a->descripcion = $request->get('descripcion');
            $a->entregable = $request->get('entregable');
            $a->cantidad_entregable = $request->get('cantidad_entregable');
            $a->fecha_inicio = $request->get('fecha_inicio');
            $a->fecha_termino = $request->get('fecha_termino');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_creador = $request->get('usuario');
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
        else if ($evento == 'U') {
            $a = AnotacionActividad::find($request->get('hallazgo_actividad_id'));
            $a->hallazgo_causa_raiz_id = $request->get('hallazgo_causa_raiz_id');
            $a->descripcion = $request->get('descripcion');
            $a->entregable = $request->get('entregable');
            $a->cantidad_entregable = $request->get('cantidad_entregable');
            $a->fecha_inicio = $request->get('fecha_inicio');
            $a->fecha_termino = $request->get('fecha_termino');
            $a->responsable_id = $request->get('responsable_id');
            $a->usuario_modificador = $request->get('usuario');
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
    }
}
