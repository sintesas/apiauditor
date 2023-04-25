<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'IdPersonal',
        'IdEmpresa',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function crud_usuarios(Request $request, $evento) {
        $options = [ 'cost' => 15 ];
        if ($evento == 'C') {
            $m = new User;
            $m->name = $request->get('name');
            $m->IdPersonal = $request->get('idpersonal');
            $m->IdEmpresa = $request->get('idempresa');
            $m->email = $request->get('email');
            $m->password = password_hash($request->get('password'), PASSWORD_BCRYPT, $options);
            $m->created_at = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = User::find($request->get('id'));
            $m->name = $request->get('name');
            $m->IdPersonal = $request->get('idpersonal');
            $m->IdEmpresa = $request->get('idempresa');
            $m->email = $request->get('email');
            $m->password = password_hash($request->get('password'), PASSWORD_BCRYPT, $options);
            $m->updated_at = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
    }
}
