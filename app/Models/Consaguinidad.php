<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consaguinidad extends Model
{
    use HasFactory;
    protected $table = "t_consaguinidad";
    protected $fillable = ['id','nombres','apellido_paterno','apellido_materno','id_funcionario','id_parentesco',];
    public function t_parentescos(){
        return $this->hasOne('use App\Models\Parentesco;','id','id_parentesco');
     }
     public function t_funcionario(){
        return $this->hasOne('use App\Models\Funcionario;','id','id_funcionario');
     }
}
