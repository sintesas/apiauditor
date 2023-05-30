<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Inspeccion extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'sg_adm_inspecciones';

    protected $primaryKey = 'inspeccion_id';

    public $timestamps = false;
}
