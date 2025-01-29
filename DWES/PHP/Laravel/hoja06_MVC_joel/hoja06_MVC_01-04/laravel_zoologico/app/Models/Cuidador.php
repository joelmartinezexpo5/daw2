<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    public function animales()
    {
        return $this->belongsToMany(Animal::class);
    }
}
