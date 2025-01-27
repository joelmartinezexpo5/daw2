<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $table = 'animales_revisiones';

    protected $fillable = ['animal_id', 'fecha', 'descripcion'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
