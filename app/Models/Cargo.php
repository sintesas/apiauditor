<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'AU_Mst_Cargo';

    protected $primaryKey = 'IdCargo';

	public $timestamps = false;
}
