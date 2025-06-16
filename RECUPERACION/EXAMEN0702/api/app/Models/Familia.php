<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{

    public $table="familias";
    public $fillable =['codigo','nombre'];

  public function productos(){
    return $this->hasMany(Producto::class,'familia_id');
  }
}
