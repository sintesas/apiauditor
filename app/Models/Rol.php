<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [ 'name', 'guard_name', 'activo' ];

    public $timestamps = false;

    public function crud_roles(Request $request, $evento) {
        if ($evento == 'C') {
            $rol = new Rol;
            $rol->name = $request->get('name');
            $rol->guard_name = 'web';
            $rol->activo = 1;
            $rol->created_at = \DB::raw('GETDATE()');
            $rol->save();            

            return $rol;
        }
        else if ($evento == 'U') {
            $rol = Rol::find($request->get('id'));
            $rol->name = $request->get('name');
            $rol->guard_name = 'web';
            $rol->activo = $request->get('activo') == true ? 1 : 0;
            $rol->updated_at = \DB::raw('GETDATE()');
            $rol->save();

            return $rol;
        }
    }
}
