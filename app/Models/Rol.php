<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'sg_adm_roles';

    protected $primaryKey = 'rol_id';

    protected $fillable = [ 'rol', 'activo' ];

    public $timestamps = false;

    public function crud_roles(Request $request, $evento) {
        if ($evento == 'C') {
            $rol = new Rol;
            $rol->name = $request->get('rol');
            $rol->activo = 1;
            $rol->created_at = \DB::raw('GETDATE()');
            $rol->save();            

            return $rol;
        }
        else if ($evento == 'U') {
            $rol = Rol::find($request->get('rol_id'));
            $rol->name = $request->get('rol');
            $rol->activo = $request->get('activo') == true ? 1 : 0;
            $rol->updated_at = \DB::raw('GETDATE()');
            $rol->save();

            return $rol;
        }
    }

    public function get_roles_by_user(Request $request) {
        $db = \DB::select('select r.rol from vw_sg_adm_usuarios_roles ur inner join sg_adm_roles r on ur.rol_id = r.rol_id where ur.usuario_id = :id', array('id' => $request->get('usuario_id')));

        return $db;
    }
}
