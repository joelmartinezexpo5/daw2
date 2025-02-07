<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 * schema="Categoria",
 * type="object",
 * title="Categoria",
 * @OA\Property(property="id", type="integer", example="1"),
 * @OA\Property(property="nombre", type="string", example="Categoria 1")
 * )
 */
class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
