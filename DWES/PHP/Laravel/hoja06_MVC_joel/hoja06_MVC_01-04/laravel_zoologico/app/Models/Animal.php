<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Revision;
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

    public function revisiones()
    {
        return $this->hasMany(Revision::class);
    }

    public function cuidadores()
    {
        return $this->belongsToMany(Cuidador::class);
    }
}
