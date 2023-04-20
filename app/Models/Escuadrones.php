<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuadrones extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Escuadron';

    protected $primaryKey = 'IdEscuadron';

	public $timestamps = false;
}
