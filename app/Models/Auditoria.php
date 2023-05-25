<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_Auditorias';

    protected $primaryKey = 'IdAuditoria';

    public $timestamps = false;

    public static function getAuditorias() {
        return Auditoria::join('AU_Reg_Empresas', 'AU_Reg_Empresas.IdEmpresa', '=', 'AU_Reg_Auditorias.IdEmpresa')
                        ->leftjoin('AU_Reg_Empresas as emp2', 'emp2.IdEmpresa', '=', 'AU_Reg_Auditorias.IdEmpresaAudita')
                        ->join('AU_Mst_TiposAuditoria', 'AU_Mst_TiposAuditoria.IdTipoAuditoria', '=', 'AU_Reg_Auditorias.IdTipoAuditoria')
                        ->select('IdAuditoria', 'Codigo as codigo', 'AU_Reg_Empresas.SiglasNombreClave as SiglasNombreClave', 'NombreAuditoria as nombre_inspeccion', 'emp2.NombreEmpresa as EmpresaAudita', 'FechaInicio as fecha_inicio', 'AU_Reg_Auditorias.IdTipoAuditoria', 'AU_Mst_TiposAuditoria.TipoAuditoria as tipo_inspeccion')
                        ->orderBy('NombreAuditoria', 'DESC')
                        ->orderBy('Codigo', 'DESC')
                        ->get();
      }
}
