<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnotacionCausaRaiz extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_hallazgos_causa_raiz';

    protected $primaryKey = 'hallazgo_causa_raiz_id';

    public $timestamps = false;

    public function getAnotacionCausaRaiz(Request $request) {
        $db = AnotacionCausaRaiz::select('hallazgo_causa_raiz_id','hallazgo_id','causa_raiz')
                ->where('hallazgo_id', '=', $request->get('hallazgo_id'))
                ->get();

        return $db;
    }

    public function crud_anotaciones_causa_raiz(Request $request, $evento) {
        if ($evento == 'C') {
            $a = new AnotacionCausaRaiz;
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->causa_raiz = $request->get('causa_raiz');
            $a->usuario_creador = $request->get('usuario');
            $a->fecha_creacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
        else if ($evento == 'U') {
            $a = AnotacionCausaRaiz::find($request->get('hallazgo_causa_raiz_id'));
            $a->hallazgo_id = $request->get('hallazgo_id');
            $a->causa_raiz = $request->get('causa_raiz');
            $a->usuario_modificador = $request->get('usuario');
            $a->fecha_modificacion = \DB::raw('GETDATE()');
            $a->save();

            return $a;
        }
    }
}
