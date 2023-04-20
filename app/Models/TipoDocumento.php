<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_TipoDocumento';

    protected $primaryKey = 'IdTipoDoc';

	public $timestamps = false;
}
