<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';
    public function getEdad()
    {
        $fechaFormateada = Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
