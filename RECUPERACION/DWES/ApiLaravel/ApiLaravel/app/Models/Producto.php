<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

/**
 * @OA\Schema(
 *  schema="Producto",
 *  type="object",
 *  title="Producto",
 *  required={"id", "nombre", "precio", "stock"},
 *  @OA\Property(property="id", type="integer", example=1),
 *  @OA\Property(property="nombre", type="string", example="Ratón inalámbrico"),
 *  @OA\Property(property="descripcion", type="string", example="Ratón con conexión Bluetooth"),
 *  @OA\Property(property="precio", type="number", format="float", example=19.99),
 *  @OA\Property(property="stock", type="integer", example=100),
 *  @OA\Property(property="categoria", ref="#/components/schemas/Categoria")
 * )
 */
class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'stock', 'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
