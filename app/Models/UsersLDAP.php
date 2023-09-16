<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UsersLDAP extends Model
{
    use HasFactory;

    protected $primaryKey = 'usuario_id';

    protected $table = 'tb_reg_usuarios';

    public function getUsersLDAP() {
        $db = \DB::select('select * from vw_usuarios_ldap order by 1');
  
        return $db;
    }

    public function getFuncionarios() {
        $db = \DB::select('select usuario_id, nombre_completo from vw_usuarios_ldap order by 1');

        return $db;
    }

    public function getResponsables() {
        $db = \DB::select('select usuario_id, nombre_completo from vw_usuarios_ldap order by 1');

        return $db;
    }
}
