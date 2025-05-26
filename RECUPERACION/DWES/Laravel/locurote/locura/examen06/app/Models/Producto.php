<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ✅ Importa la clase correcta
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    protected $fillable = ['nombre', 'slug', 'descripcion', 'precio', 'familia_id'];

    public function familia(): BelongsTo
    {
        return $this->belongsTo(Familia::class);
    }

    public function imagenes(): HasMany
    {
        return $this->hasMany(Imagen::class);
    }
}
