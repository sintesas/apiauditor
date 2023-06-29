<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionArchivo extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_archivo';

    protected $primaryKey = 'hallazgo_archivo_id';

    public $timestamps = false;

    public function getAnotacionArchivo(Request $request) {
        $db = AnotacionArchivo::select('hallazgo_archivo_id','hallazgo_id','archivo')
                ->where('hallazgo_id', '=', $request->get('hallazgo_id'))
                ->get();

        return $db;
    }

    public function guardarArchivo($hallazgo_id, $archivo, $usuario) {
        $a = new AnotacionArchivo;
        $a->hallazgo_id = $hallazgo_id;
        $a->archivo = $archivo;
        $a->usuario_creador = $usuario;
        $a->fecha_creacion = \DB::raw('GETDATE()');
        $a->save();
    }
}
