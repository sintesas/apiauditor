<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'sg_adm_usuarios';

    protected $primaryKey = 'usuario_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'empresa_id',
        'usuario',
        'nombre_completo',
        'email',
        'password',
        'activo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function crud_usuarios(Request $request, $evento) {
        $options = [ 'cost' => 15 ];
        if ($evento == 'C') {
            $m = new Usuario;
            $m->usuario = substr(strtolower($request->get('email')), 0, strpos(strtolower($request->get('email')), "@"));
            $m->nombre_completo = $request->get('nombre_completo');
            $m->personal_id = $request->get('personal_id');
            $m->empresa_id = $request->get('empresa_id');
            $m->email = $request->get('email');
            $m->password = password_hash($request->get('password'), PASSWORD_BCRYPT, $options);
            $m->activo = 1;
            $m->usuario_creador = $request->get('usuario');
            $m->fecha_creacion = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = Usuario::find($request->get('usuario_id'));
            $m->usuario = substr(strtolower($request->get('email')), 0, strpos(strtolower($request->get('email')), "@"));
            $m->nombre_completo = $request->get('nombre_completo');
            $m->personal_id = $request->get('personal_id');
            $m->empresa_id = $request->get('empresa_id');
            $m->email = $request->get('email');
            $m->password = password_hash($request->get('password'), PASSWORD_BCRYPT, $options);
            $m->activo = $request->get('activo') == true ? 1 : 0;
            $m->usuario_modificador = $request->get('usuario');
            $m->fecha_modificacion = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
    }
}
