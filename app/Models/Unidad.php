<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Unidades';

    protected $primaryKey = 'IdUnidad';

	public $timestamps = false;
}
