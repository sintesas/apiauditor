<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProcesoAuditoria extends Model
{
    use HasFactory;

    protected $table = 'dbo.AU_Reg_ProcesosAuditorias';

    protected $primaryKey = 'IdProceso';

    public $timestamps = false;
}
