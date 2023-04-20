<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Taller';

    protected $primaryKey = 'IdTaller';

	public $timestamps = false;
}
