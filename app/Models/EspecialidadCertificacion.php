<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadCertificacion extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_EspecialidadesCertificacion';

    protected $primaryKey = 'IdEspecialidadCertificacion';

	public $timestamps = false;

    public function especialidad() {
		return $this->hasOne(EspecialidadCertificacion::class, 'IdEspecialidadCertificacion', 'IdEspecialidadCertificacion');
	}
}
