<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conyugue extends Model
{
    use HasFactory;
    protected $table = "t_conyugue";
    protected $fillable = ['id','numero_ci','complemento','expedido','apellido_paterno','apellido_materno','nombres','direccion'];
    public function t_funcionario(){
        return $this->hasOne('use App\Models\Funcionario;','id','id_funcionario');
     }
}
