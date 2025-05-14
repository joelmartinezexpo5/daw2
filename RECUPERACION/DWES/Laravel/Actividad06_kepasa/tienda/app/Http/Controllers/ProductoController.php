<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Familia;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('familia', 'imagenes')->get();
        return view('productos.index', compact('productos'));
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function create()
    {
        $familias = Familia::all();
        return view('productos.create', compact('familias'));
    }

    public function store(ProductoRequest $request)
    {
        $producto = Producto::create($request->only('nombre', 'descripcion', 'familia_id'));

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
            Storage::disk('imagenes')->putFileAs('', $archivo, $nombreArchivo);

            Imagen::create([
                'producto_id' => $producto->id,
                'archivo' => $nombreArchivo,
            ]);
        }

        return redirect()->route('productos.index')->with('mensaje', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $familias = Familia::all();
        return view('productos.edit', compact('producto', 'familias'));
    }

    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->only('nombre', 'descripcion', 'familia_id'));

        if ($request->hasFile('imagen')) {
            if ($producto->imagenes->isNotEmpty()) { // 👈 usa 'imagenes' correctamente
                Storage::delete('public/imagenes/' . $producto->imagenes->first()->archivo);
                $producto->imagenes->first()->delete();
            }

            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            Storage::disk('imagenes')->putFileAs('', $archivo, $nombreArchivo);

            Imagen::create([
                'producto_id' => $producto->id,
                'archivo' => $nombreArchivo,
            ]);
        }

        return redirect()->route('productos.index')->with('mensaje', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagenes->isNotEmpty()) {
    foreach ($producto->imagenes as $imagen) {
        Storage::delete('public/imagenes/' . $imagen->archivo);
        $imagen->delete();
    }
}

        $producto->delete();

        return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado correctamente.');
    }

    public function agregarACesta(Request $request, Producto $producto)
    {
        // Obtener la cesta actual de la sesión
        $cesta = session()->get('cesta', []);

        // Agregar o actualizar el producto
        if (isset($cesta[$producto->id])) {
            $cesta[$producto->id]['cantidad']++;
        } else {
            $cesta[$producto->id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ];
        }

        // Guardar en la sesión
        session()->put('cesta', $cesta);

        return redirect()->route('cesta.index')->with('success', 'Producto agregado a la cesta.');
    }
}
