<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Grado';

    protected $primaryKey = 'IdTipoDoc';

	public $timestamps = false;

	public function getCostoshh() {
		return Grado::orderBy('IdGrado','desc')
			->select('IdGrado',
					 'Abreviatura',
					 'NombreGrado',
					 'Salario',
					 \DB::raw('(Salario / 160) as hh'))
			->get();
	}
}
