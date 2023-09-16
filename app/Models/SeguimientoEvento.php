<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SeguimientoEvento extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_seguimiento_evento';

    protected $primaryKey = 'evento_id';

	public $timestamps = false;

    public function getEventos(Request $request) {
        $db = \DB::select('select evento_id,try_cast(fecha_evento as date) fecha_evento,descripcion from sg_adm_seguimiento_evento where seguimiento_id = :id order by 1', array('id' => $request->get('seguimiento_id')));

        return $db;
    }

    public function crud_eventos(Request $request, $evento) {
        if ($evento == 'C') {
            $e = new SeguimientoEvento;
            $e->seguimiento_id = $request->get('seguimiento_id');
            $e->fecha_evento = $request->get('fecha_evento');
            $e->descripcion = $request->get('descripcion');
            $e->usuario_creador = $request->get('usuario');
            $e->fecha_creacion = \DB::raw('GETDATE()');
            $e->save();

            return $e;
        }
        else if ($evento == 'U') {
            $e = SeguimientoEvento::find($request->get('evento_id'));
            $e->seguimiento_id = $request->get('seguimiento_id');
            $e->fecha_evento = $request->get('fecha_evento');
            $e->descripcion = $request->get('descripcion');
            $e->usuario_modificador = $request->get('usuario');
            $e->fecha_modificacion = \DB::raw('GETDATE()');
            $e->save();

            return $e;
        }
    }
}
