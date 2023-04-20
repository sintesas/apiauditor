<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_Personal';

    protected $primaryKey = 'IdPersonal';

	public $timestamps = false;

    public static function getPersonas() {
        return Personal::orderBy('Nombres', 'asc')
       ->leftjoin('AU_Mst_Grado', 'AU_Mst_Grado.IdGrado', '=', 'AU_Reg_Personal.IdGrado')
       ->join('users', 'users.IdPersonal', '=', 'AU_Reg_Personal.IdPersonal')
       ->select("AU_Reg_Personal.IdPersonal","users.id","AU_Mst_Grado.Abreviatura as Grado","AU_Reg_Personal.Nombres","AU_Reg_Personal.Apellidos","AU_Reg_Personal.Cedula","AU_Reg_Personal.Email")->get();
   }

   public function getPersonalWithRango(){
    return Personal::orderBy('Nombres', 'asc')
   ->leftjoin('AU_Mst_Grado', 'AU_Mst_Grado.IdGrado', '=', 'AU_Reg_Personal.IdGrado')
   ->select("AU_Reg_Personal.IdPersonal", \DB::raw("CONCAT (AU_Mst_Grado.Abreviatura, ' | ', AU_Reg_Personal.Nombres, ' ',AU_Reg_Personal.Apellidos) as Nombres"))->get();
}
}