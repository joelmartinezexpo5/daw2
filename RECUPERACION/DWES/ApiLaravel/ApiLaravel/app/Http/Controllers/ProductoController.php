<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
 */
class ProductoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/productos",
     *     summary="Obtener lista de productos",
     *     description="Devuelve una lista paginada de productos con su categoría asociada",
     *     operationId="index",
     *     tags={"productos"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de productos",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Producto")
     *         )
     *     )
     * )
     */
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
    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return new ProductoResource($producto);
    }

    /**
     * @OA\Post(
     *  path="/api/productos",
     *  summary="Crear un producto",
     *  tags={"productos"},
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Producto")
     *  ),
     *  @OA\Response(
     *      response=201,
     *      description="Producto creado"
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="Error de validación"
     *  )
     * )
     */
    public function store(StoreProductoRequest $request)
    {
        $datos = $request->validated();

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $datos['imagen'] = $rutaImagen;
        }

        $producto = Producto::create($datos);

        return new ProductoResource($producto->load('categoria'));
    }




    /**
     * @OA\Put(
     *  path="/api/productos/{id}",
     *  summary="Actualizar un producto",
     *  tags={"productos"},
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(type="integer")
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Producto")
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Producto actualizado"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Producto no encontrado"
     *  )
     * )
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100|unique:productos,nombre,' . $producto->id,
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'nullable|integer|exists:categorias,id'
        ]);

        $producto->update($validated);
        return new ProductoResource($producto->load('categoria'));
    }

    /**
     * @OA\Delete(
     *  path="/api/productos/{id}",
     *  summary="Eliminar un producto",
     *  tags={"productos"},
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(type="integer")
     *  ),
     *  @OA\Response(
     *      response=204,
     *      description="Producto eliminado"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Producto no encontrado"
     *  )
     * )
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->noContent();
    }
}

