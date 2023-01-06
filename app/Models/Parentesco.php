<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;
    protected $table = "t_parentescos";
    public $timestamps = false;
    public $updated_at = false;
    static $rules = [
        'id_tipoParentesco' => 'required',
        'id_grado' => 'required',
        'parentesco' => 'required',
    ];
    protected $fillable = ['id','id_tipoParentesco','parentesco','id_grado'];
    public function t_grado(){
        return $this->hasOne('App\Models\Grado','id','id_grado');
    }
    public function tipo_parentesco(){
        return $this->hasOne('App\Models\tipo_parentesco','id','id_tipoParentesco');
    }
    public function t_consaguinidad(){
        return $this->hasOne('App\Models\Consaguinidad','id','id_consaguinidad');
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
