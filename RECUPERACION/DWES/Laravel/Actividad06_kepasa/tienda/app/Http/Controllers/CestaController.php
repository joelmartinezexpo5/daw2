<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CestaController extends Controller
{
    // Mostrar los productos en la cesta
    public function index()
    {
        $cesta = session()->get('cesta', []);
        return view('cesta.index', compact('cesta'));
    }

    // Agregar un producto a la cesta
    public function agregar(Request $request, Producto $producto)
    {
        $cesta = session()->get('cesta', []);

        if (isset($cesta[$producto->id])) {
            $cesta[$producto->id]['cantidad']++;
        } else {
            $cesta[$producto->id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio ?? 0,
                'cantidad' => 1,
            ];
        }

        session()->put('cesta', $cesta);

        return redirect()->back()->with('mensaje', 'Producto agregado a la cesta.');
    }

    // Eliminar un producto de la cesta
    public function eliminar($id)
    {
        $cesta = session()->get('cesta', []);

        if (isset($cesta[$id])) {
            unset($cesta[$id]);
            session()->put('cesta', $cesta);
        }

        return redirect()->route('cesta.index')->with('mensaje', 'Producto eliminado de la cesta.');
    }

    // Vaciar la cesta por completo
    public function vaciar()
    {
        session()->forget('cesta');
        return redirect()->route('cesta.index')->with('mensaje', 'Cesta vaciada correctamente.');
    }
}
