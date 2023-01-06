<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = "t_funcionario";
    protected $fillable = ['id','numero_ci','complemento','expedido','apellido_paterno','apellido_materno','nombres',
                            'fecha_nacimiento','direccion','celular','fiscalia_otro','unidad','fecha_registro'];
    public function conyugue(){
     return $this->hasMany(Conyugue::class,'id');
    }
    public function t_usuario(){
        return $this->hasMany(Usuario::class,'id');
       }
       public function t_consaguinidad(){
        return $this->hasMany(Usuario::class,'id');
       }
                            
}
