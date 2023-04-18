<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CriteriosAuditorias extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_CriteriosAuditorias';

    protected $primaryKey = 'IdCriterio';

    public $timestamps = false;
}
