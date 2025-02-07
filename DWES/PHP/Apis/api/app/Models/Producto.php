<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 * schema="Producto",
 * type="object",
 * title="Producto",
 * @OA\Property(property="id", type="integer", example="1"),
 * @OA\Property(property="nombre", type="string", example="Producto 1"),
 * @OA\Property(property="precio", type="number", example="10.5"),
 * @OA\Property(property="categoria_id", type="integer", example="1")
 * )
 */

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','descripcion','precio','stock','categoria_id'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
