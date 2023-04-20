<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasExperiencia extends Model
{
    use HasFactory;

    protected $table = 'dbo.AU_Mst_AreasExperienciaSectorAero';

    protected $primaryKey = 'IdAreaExperiencia';

	public $timestamps = false;
}
