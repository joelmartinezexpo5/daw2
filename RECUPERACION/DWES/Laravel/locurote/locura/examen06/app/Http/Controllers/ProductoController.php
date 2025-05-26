<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Familia;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // ✅ Asegúrate de tener esta línea



class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('familia', 'imagenes')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $familias = Familia::all();
        return view('productos.create', compact('familias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'familia_id' => 'required|exists:familias,id',
            'archivo' => 'nullable|image|max:2048'
        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'familia_id' => $request->familia_id,
        ]);

        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('imagenes', 'public');
            Imagen::create([
                'producto_id' => $producto->id,
                'archivo' => $path
            ]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado.');
    }

    public function show(Producto $producto)
    {
        $producto->load('familia', 'imagenes');
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $familias = Familia::all();
        $producto->load('imagenes');
        return view('productos.edit', compact('producto', 'familias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'familia_id' => 'required|exists:familias,id',
            'archivo' => 'nullable|image|max:2048'
        ]);

        $producto->update([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'familia_id' => $request->familia_id,
        ]);

        if ($request->hasFile('archivo')) {
            $imagenAnterior = $producto->imagenes()->first();
            if ($imagenAnterior) {
                Storage::disk('public')->delete($imagenAnterior->archivo);
                $imagenAnterior->delete();
            }
            $path = $request->file('archivo')->store('imagenes', 'public');
            Imagen::create([
                'producto_id' => $producto->id,
                'archivo' => $path
            ]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }

}