<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuerza extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Fuerza';

    protected $primaryKey = 'IdFuerza';

	public $timestamps = false;
}
