<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_Empresas';

    protected $primaryKey = 'IdEmpresa';

    public $timestamps = false;
}
