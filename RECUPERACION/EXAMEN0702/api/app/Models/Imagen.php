<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{

    public $table="imagenes";
    public $fillable =['nombre','url'];

    public function producto(){
        return $this->hasOne(Producto::class,'imagen_id');
    }
}
