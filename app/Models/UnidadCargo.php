<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadCargo extends Model
{
    use HasFactory;
    protected $table = "t_unidad_cargo";
    public $timestamps = false;
    public $updated_at = false;
    static $rules = [
        'unidad' => 'required',
        'cargo' => 'required',
        'id_fiscalia' => 'required',
    ];
    protected $fillable = ['id','unidad','cargo','id_fiscalia'];
  

    
    public function t_fiscalias(){
       return $this->hasOne('use App\Models\Fiscalias;','id','id_fiscalia');
    }
   

}

