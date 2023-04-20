<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelCompetencias extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_NivelCompetencia';

    protected $primaryKey = 'IdNivelCompetencia';

	public $timestamps = false;
}
