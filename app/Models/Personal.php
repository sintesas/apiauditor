<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Usuario;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_personal';

    protected $primaryKey = 'personal_id';

    public $timestamps = false;

    public static function getPersonas() {
        $db = \DB::select('select * from vw_sg_adm_personal order by nombres');

        return $db;
    }

    public function crud_personales(Request $request, $evento) {
        if ($evento == 'C') {
            $persona = new Personal;
            $persona->tipo_documento_id = $request->get('tipo_documento_id');
            $persona->num_identificacion = $request->get('num_identificacion');
            $persona->nombres = $request->get('nombres');
            $persona->apellidos = $request->get('apellidos');            
            $persona->email = $request->get('email');
            $persona->activo = 1;
            $persona->usuario_creador = $request->get('usuario');
            $persona->fecha_creacion = \DB::raw('GETDATE()');
            $persona->save();

            return $persona;
        }
        else if ($evento == 'U') {
            $persona = Personal::find($request->get('personal_id'));
            $persona->tipo_documento_id = $request->get('tipo_documento_id');
            $persona->num_identificacion = $request->get('num_identificacion');
            $persona->nombres = $request->get('nombres');
            $persona->apellidos = $request->get('apellidos');            
            $persona->email = $request->get('email');
            $persona->activo = $request->get('activo') == true ? 1 : 0;;
            $persona->usuario_modificador = $request->get('usuario');
            $persona->fecha_modificacion = \DB::raw('GETDATE()');

            $u = Usuario::find($request->get('usuario_id'));
            $u->activo = $request->get('activo') == true ? 1 : 0;
            $u->usuario_modificador = $request->get('usuario');
            $u->fecha_modificacion = \DB::raw("GETDATE()");
            $u->save();

            $persona->save();

            return $persona;
        }
    }
}