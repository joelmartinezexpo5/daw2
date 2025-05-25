<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'precio', 'imagen', 'familia_codigo'];

    public function familia()
    {
        return $this->belongsTo(Familia::class, 'familia_codigo', 'codigo');
    }
}
