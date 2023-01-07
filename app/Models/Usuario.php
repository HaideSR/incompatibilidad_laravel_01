<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "t_usuarios";
    protected $hidden = [
      'password',
      'remember_token',
   ];
    protected $fillable = ['id','cedula_identidad','complemento','expedido','nombres','apellido_paterno','apellido_materno',
                            'usuario','clave','email','activado','perfil'];


     public function funcionario(){
         return $this->hasMany(Funcionario::class,'id');
    }
}
