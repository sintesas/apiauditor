<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciasLDAP extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_DependenciasLDAP';

    protected $primaryKey = 'IdDependencia';

    protected $fillable = ['Nombre', 'Created_at', 'Update_at'];

    public $timestamps = false;
}
