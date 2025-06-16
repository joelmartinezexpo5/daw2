<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = "productos";
    public $fillable = ['titulo', 'descripcion', 'precio', 'imagen_id', 'familia_id', 'slug'];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function imagen()
    {
        return $this->belongsTo(Imagen::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
