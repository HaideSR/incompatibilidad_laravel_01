<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = "t_grado";
    //protected $fillable = ['id','grados'];
	public $timestamps = false;
    public $updated_at = false;
	public function parentesco(){
		return $this->hasMany(Parentesco::class,'id');
	}
	/**
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return Grado
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
