<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Especialidades extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_EspecialidadesPersonal';

    protected $primaryKey = 'IdEspecialidad';

    public $timestamps = false;

    public static function GetEspecialidades() {
		return Especialidades::orderBy('AU_Mst_EspecialidadesPersonal.IdEspecialidad', 'desc')
    				->join('AU_Mst_Cuerpo', 'AU_Mst_Cuerpo.IdCuerpo', '=', 'AU_Mst_EspecialidadesPersonal.IdCuerpo')
    				->select('AU_Mst_EspecialidadesPersonal.IdEspecialidad', 
    						'AU_Mst_Cuerpo.NombreCuerpo',
    						'AU_Mst_EspecialidadesPersonal.NombreEspecialidad')
    				->get();
	}
}
