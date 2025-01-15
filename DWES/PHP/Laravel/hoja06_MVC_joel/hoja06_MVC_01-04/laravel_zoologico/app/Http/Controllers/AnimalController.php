<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('animales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $animal)
    {
        return view('animales.show',['animal'=>$animal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $animal)
    {
        return view('animales.edit', ['animal' => $animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
