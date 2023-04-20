<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CarrerasProfesiones extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_CarrerasProfesiones';

    protected $primaryKey = 'IdCarreraProfesion';

	public $timestamps = false;

    public function getProfecionesMilitares(){
		return CarrerasProfesiones::orderBy('CarreraProfesion')
			->select('IdCarreraProfesion as IdCarreraProfesionMil',
					 'CarreraProfesion')->get();
	}
}
