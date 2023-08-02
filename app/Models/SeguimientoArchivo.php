<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SeguimientoArchivo extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_seguimiento_archivo';

    protected $primaryKey = 'seguimiento_archivo_id';

    public $timestamps = false;

    public function getSeguimientoArchivo(Request $request) {
        $db = SeguimientoArchivo::select('seguimiento_archivo_id','seguimiento_id','archivo')
                ->where('seguimiento_id', '=', $request->get('seguimiento_id'))
                ->get();

        return $db;
    }

    public function guardarArchivo($seguimiento_id, $archivo, $usuario) {
        $a = new SeguimientoArchivo;
        $a->seguimiento_id = $seguimiento_id;
        $a->archivo = $archivo;
        $a->usuario_creador = $usuario;
        $a->fecha_creacion = \DB::raw('GETDATE()');
        $a->save();
    }
}
