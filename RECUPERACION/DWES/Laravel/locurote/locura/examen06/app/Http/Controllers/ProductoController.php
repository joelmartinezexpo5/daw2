<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Familia;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('familia')->get();
    return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::all();
    return view('productos.create', compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'titulo' => 'required',
        'descripcion' => 'nullable',
        'precio' => 'required|numeric',
        'imagen' => 'required',
        'familia_codigo' => 'required|exists:familias,codigo',
    ]);

    Producto::create($request->all());
    return redirect()->route('productos.index')->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $familias = Familia::all();
    return view('productos.edit', compact('producto', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
        'titulo' => 'required',
        'descripcion' => 'nullable',
        'precio' => 'required|numeric',
        'imagen' => 'required',
        'familia_codigo' => 'required|exists:familias,codigo',
    ]);

    $producto->update($request->all());
    return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
