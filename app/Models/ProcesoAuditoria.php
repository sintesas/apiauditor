<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProcesoAuditoria extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_ProcesosAuditorias';

    protected $primaryKey = 'IdProceso';

    public $timestamps = false;

    public function getProcesosGroupBy() {
        return ProcesoAuditorias::select('IdProceso','Proceso')
        ->get()
        ->keyBy('Proceso');
    }

    public function getSubProcesosGroupBy(Request $request) {
        return ProcesoAuditorias::select('IdProceso','SubProceso')
        ->where('Proceso','like',$request->get('texto'))
        ->get();
    }
}
