<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Use a token to authenticate",
 *     name="Authorization",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )
 */

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();

        return ProductoResource::collection($productos);
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *  path="/api/productos/{id}",
     *  summary="Obtener un producto",
     *  description="Obtener un producto por su id",
     *  operationId="show",
     *  tags={"productos"},
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id del producto",
     *   required=true,
     *   @OA\Schema(type="integer",example="1")
     *  ),
     *  @OA\Response(
     *  response=200,
     *  description="Producto encontrado",
     *  @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     *  @OA\Response(
     *  response=404,
     *  description="Producto no encontrado"
     *  )
     * )
     */
    public function show(Producto $producto)
    {
        // $producto = Producto::find($id);
        return new ProductoResource($producto->load('categoria'));
    }

    /**
*@OA\Post(
    * path="/api/productos",
    * summary="Crear un producto",
    * description="Crear un producto",
    * operationId="store",
    * tags={"productos"},
    * security={{"bearerAuth": {}}},
    * @OA\RequestBody(
        * required=true,
        * description="Datos del producto",
        * @OA\JsonContent(
            * required={"nombre","precio","stock"},
            * @OA\Property(property="nombre", type="string", example="Producto 1"),
            * @OA\Property(property="descripcion", type="string", example="Descripción del producto"),
            * @OA\Property(property="precio", type="number", format="float", example="10.5"),
            * @OA\Property(property="stock", type="integer", example="10"),
            * @OA\Property(property="categoria_id", type="integer", example="1")
        *),

    *),
    * @OA\Response(
        * response=201,
        * description="Producto creado",
        * @OA\JsonContent(ref="#/components/schemas/Producto")
    *),
    * @OA\Response(
        * response=422,
        * description="Error de validación"
    * ),
    * @OA\Response(
        * response=401,
        * description="No autorizado"
    * )
* )
*/
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:100|unique:productos',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'nullable|integer|exists:categorias,id'
        ], [
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres',
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'El nombre ya existe',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser negativo',
            'stock.required' => 'El stock es obligatorio',
            'stock.min' => 'El stock no puede ser negativo',
            'stock.integer' => 'El stock debe ser un número entero',
            'categoria_id.exists' => 'La categoría no existe'
        ]);

        $producto = Producto::create($validatedData);
        return new ProductoResource($producto);
    }
}
