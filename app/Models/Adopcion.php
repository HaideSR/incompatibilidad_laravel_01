<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;
    protected $table = "t_re_adopcion";
    protected $fillable = ['id','nombres','apellido_paterno','apellido_materno','id_parentesco','id_funcionario'];
}
