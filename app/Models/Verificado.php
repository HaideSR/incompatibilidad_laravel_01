<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verificado extends Model
{
    use HasFactory;
    protected $table = "t_estado_verificacion";
    public $timestamps = false;
    public $updated_at = false;
    static $rules = [
        'id_funcionario' => 'required',
        'fecha' => 'required',
        'id_motivodeclaracion' => 'required',
        'archivo' => 'required',
        'estado' => 'required',
    ];
    protected $fillable = ['id','id_funcionario','fecha','id_motivodeclaracion','archivo','estado'];
    public function t_funcionario(){
        return $this->hasOne('App\Models\Funcionario','id','id_funcionario');
    }
    public function t_motivo_declaracion(){
        return $this->hasOne('App\Models\MotivoDeclaracion','id','id_motivodeclaracion');
    }
 




	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}

}
