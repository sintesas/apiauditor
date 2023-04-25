<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CuerposFAC extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Cuerpo';

    protected $primaryKey = 'IdCuerpo';

	public $timestamps = false;

    public function getCuerpos(){
		return CuerposFAC::orderBy('CuerpoFAC', 'NombreCuerpo')
		->select('IdCuerpo', \DB::raw("CONCAT ( CuerpoFAC, ' | ', NombreCuerpo) as NombreCuerpo"))
		->get();
	}

	public function getCuerposByGrado(Request $request){

		$grado = Grado::find($request->get('IdGrado'));

		return CuerposFAC::where('AU_Mst_Cuerpo.CuerpoFAC','=', $grado->Categoria)
		->select('IdCuerpo', 'NombreCuerpo')
		->get();
	}
}
