<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UsersLDAP extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdUserLDAP';

    protected $table = 'AU_Reg_usersLDAP';

    public function getUsersLDAP() {
        $db = \DB::select('select * from AU_Reg_usersLDAP order by 1');
  
        return $db;
    }

    public function getFuncionarios() {
        $db = \DB::select('select IdUserLDAP, Name from AU_Reg_usersLDAP order by 1');

        return $db;
    }

    public function getResponsables() {
        $db = \DB::select('select IdUserLDAP, Name from AU_Reg_usersLDAP order by 1');

        return $db;
    }
}
