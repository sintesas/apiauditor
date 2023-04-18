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
        if ($evento == 'C') {
            $m = new Users;
            $m->IdPersonal = null;
            $m->name = $request->get('IdPersonal');
            $m->email = $request->get('email');
            $m->password = bcrypt($request->get('password'));
            $m->created_at = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
        else if ($evento == 'U') {
            $m = Users::find($request->get('id'));
            $m->IdPersonal = null;
            $m->name = $request->get('IdPersonal');
            $m->email = $request->get('email');
            $m->password = bcrypt($request->get('password'));
            $m->updated_at = \DB::raw('GETDATE()');
            $m->save();

            return $m;
        }
    }
}
