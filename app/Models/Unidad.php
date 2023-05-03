<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Unidad extends Model
{
    use HasFactory;

    // protected $table = 'AU_Mst_Unidades';

    // protected $primaryKey = 'IdUnidad';

    protected $table = 'sg_adm_unidades';

    protected $primaryKey = 'unidad_id';

    protected $fillable = [
        'nombre_unidad,denominacion,ciudad,direccion,unidad_padre_id,activo,usuario_creador,fecha_creacion,usuario_modificador,fecha_modificacion'
    ];

	public $timestamps = false;

    public function GetUnidades() {
        $db = \DB::select('select t.*, (select nombre_unidad from sg_adm_unidades where unidad_id = t.unidad_padre_id) as unidad_padre from sg_adm_unidades t order by t.unidad_id');
        
        return $db;
    }

    public function get_unidad_by_id(Request $request) {
        $db = \DB::select('select * from sg_adm_unidades where unidad_padre_id = :id order by unidad_id', array('id' => $request->get('id')));
        
        return $db;
    }

    public function crud_unidades(Request $request, $evento) {
        if ($evento == 'C') {
            $Unidad = new Unidad;
            $Unidad->nombre_unidad = $request->get('nombre_unidad');
            $Unidad->denominacion = $request->get('denominacion');
            $Unidad->ciudad = $request->get('ciudad');
            $Unidad->direccion = $request->get('direccion');
            $Unidad->unidad_padre_id = $request->get('unidad_padre_id') == null ? null : $request->get('unidad_padre_id');
            $Unidad->activo = 1;
            $Unidad->usuario_creador = $request->get('usuario');
            $Unidad->fecha_creacion = \DB::raw('GETDATE()');
            $Unidad->save();            

            return $Unidad;
        }
        else if ($evento == 'U') {
            $Unidad = Unidad::find($request->get('unidad_id'));
            $Unidad->nombre_unidad = $request->get('nombre_unidad');
            $Unidad->denominacion = $request->get('denominacion');
            $Unidad->ciudad = $request->get('ciudad');
            $Unidad->direccion = $request->get('direccion');
            $Unidad->unidad_padre_id = $request->get('unidad_padre_id') == null ? null : $request->get('unidad_padre_id');
            $Unidad->activo = $request->get('activo') == true ? 1 : 0;
            $Unidad->usuario_modificador = $request->get('usuario');
            $Unidad->fecha_modificacion = \DB::raw('GETDATE()');
            $Unidad->save(); 

            return $Unidad;
        }
    }
}
