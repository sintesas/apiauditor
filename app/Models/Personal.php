<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_Personal';

    protected $primaryKey = 'IdPersonal';

	public $timestamps = false;
}