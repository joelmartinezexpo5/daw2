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
        $productos = Producto::with('familia', 'imagen')->get();
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
            $archivo->storeAs('public/imagenes', $nombreArchivo);

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
            if ($producto->imagen) {
                Storage::delete('public/imagenes/'.$producto->imagen->archivo);
                $producto->imagen->delete();
            }

            $archivo = $request->file('imagen');
            $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
            $archivo->storeAs('public/imagenes', $nombreArchivo);

            Imagen::create([
                'producto_id' => $producto->id,
                'archivo' => $nombreArchivo,
            ]);
        }

        return redirect()->route('productos.index')->with('mensaje', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::delete('public/imagenes/'.$producto->imagen->archivo);
            $producto->imagen->delete();
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado correctamente.');
    }
}

class CestaController extends Controller
{
    public function index()
    {
        $cesta = session('cesta', []);
        return view('cesta.index', compact('cesta'));
    }

    public function agregar(Producto $producto)
    {
        $cesta = session('cesta', []);

        $cesta[$producto->id] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
        ];

        session(['cesta' => $cesta]);

        return redirect()->route('cesta.index')->with('mensaje', 'Producto añadido a la cesta.');
    }

    public function eliminar($id)
    {
        $cesta = session('cesta', []);

        if (isset($cesta[$id])) {
            unset($cesta[$id]);
            session(['cesta' => $cesta]);
        }

        return redirect()->route('cesta.index')->with('mensaje', 'Producto eliminado de la cesta.');
    }

    public function vaciar()
    {
        session()->forget('cesta');
        return redirect()->route('cesta.index')->with('mensaje', 'Cesta vaciada correctamente.');
    }
}