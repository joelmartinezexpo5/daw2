<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['familia', 'imagen'])->get();
        return response()->json([
            "data" => ProductoResource::collection($productos),
            "message" => "Productos obtenidos correctamente",
        ]);
    }

    public function store(ProductoRequest $request)
    {
        $datos = $request->validated();
        $datos['slug'] = Str::slug($datos['titulo']);

        if ($request->hasFile('imagen') && $request->imagen->isValid()) {
            $nombreImagen = $request->imagen->store('', 'imagenesProductos');
            $url = 'imagenes/' . $nombreImagen;
            $imagen = Imagen::create(['nombre' => $nombreImagen, 'url' => $url]);
            $datos['imagen_id'] = $imagen->id;
        }

        $producto = Producto::create($datos);
        $producto->load(['familia', 'imagen']);

        return response()->json([
            'message' => 'Producto creado con éxito',
            'data' => new ProductoResource($producto),
        ], 201);
    }

    public function show(Producto $producto)
    {
        $producto->load(['familia', 'imagen']);

        return response()->json([
            "data" => new ProductoResource($producto),
            "message" => "Producto obtenido correctamente",
        ]);
    }

  public function update(ProductoRequest $request, Producto $producto)
{
    $datos = $request->validated();

    if (isset($datos['titulo'])) {
        $datos['slug'] = Str::slug($datos['titulo']);
    }

    if ($request->hasFile('imagen') && $request->imagen->isValid()) {
        if ($producto->imagen && Storage::disk('imagenesProductos')->exists($producto->imagen->nombre)) {
            Storage::disk('imagenesProductos')->delete($producto->imagen->nombre);
        }

        $nombreImagen = $request->imagen->store('', 'imagenesProductos');

        $imagen = Imagen::create([
            'nombre' => $nombreImagen,
            'url' => 'imagenes/' . $nombreImagen,
        ]);

        $datos['imagen_id'] = $imagen->id;
    }

    $producto->update($datos);
    $producto->load(['familia', 'imagen']);

    return response()->json([
        'message' => 'Producto actualizado con éxito',
        'data' => new ProductoResource($producto),
    ], 200);
}

    
    public function destroy(Producto $producto)
    {

        if ($producto->imagen && Storage::disk('imagenesProductos')->exists($producto->imagen->nombre)) {
            Storage::disk('imagenesProductos')->delete($producto->imagen->nombre);
        }

        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado correctamente',
        ], 200);
    }
}