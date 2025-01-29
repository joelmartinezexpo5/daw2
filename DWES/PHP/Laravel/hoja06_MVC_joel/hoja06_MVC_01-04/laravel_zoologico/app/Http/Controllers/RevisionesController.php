<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\Animal;
use Illuminate\Http\Request;

class RevisionesController extends Controller
{
    public function create(Animal $animal)
    {
        return view('animales.revisiones.create', compact('animal'));
    }

    public function store(Request $request, Animal $animal)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $animal->revisiones()->create([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('animales.show', $animal->slug);
    }
}
