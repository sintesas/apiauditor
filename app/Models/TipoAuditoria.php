<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TipoAuditoria extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_TiposAuditoria';

    protected $primaryKey = 'IdTipoAuditoria';

	public $timestamps = false;
}
