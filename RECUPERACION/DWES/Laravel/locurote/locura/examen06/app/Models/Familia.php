<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function productos()
    {
        return $this->hasMany(Producto::class, 'familia_codigo', 'codigo');
    }
}
