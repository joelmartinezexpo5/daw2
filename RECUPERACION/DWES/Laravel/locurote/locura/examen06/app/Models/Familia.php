<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = ['nombre'];
    
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
