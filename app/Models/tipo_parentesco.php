<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_parentesco extends Model
{
    use HasFactory;
    
    protected $table = "tipo_parentescos";
    public $timestamps = false;
    public $updated_at = false;
    protected $fillable = ['id','tipo_parentesco'];
    public function parentesco(){
		return $this->hasMany(Parentesco::class,'id');
	}
}
