<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'familia_id', 'precio', 'slug'];

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
