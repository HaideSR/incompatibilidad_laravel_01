<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscalias extends Model
{
    use HasFactory;
    protected $table = "t_fiscalias";
    protected $fillable = ['id','departamento','denominacion'];
	/**
	 * @return mixed
	 */
	public function unidad_grado(){
		return $this->hasMany(UnidadCargo::class,'id');
	}
	public function funcionario(){
		return $this->hasMany(Funcionario::class,'id');
	   }
	function getTable() {
		return $this->table;
	}
	
	/**
	 * @param mixed $table 
	 * @return Fiscalias
	 */
	function setTable($table): self {
		$this->table = $table;
		return $this;
	}
}
