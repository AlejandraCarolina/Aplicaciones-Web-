<?php

// app/Http/Controllers/InventarioController.php
namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(): View
    {
        return view('inventario.index', [
            'inventario' => Inventario::latest()->paginate(4)
        ]);
    }

    public function create()
    {
        return view('inventario.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|integer',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'nullable|date',
            'cantidad' => 'required|integer',
            'descripcion' => 'nullable',
        ]);

        Inventario::create($validated);
        return redirect()->route('inventario.index');
    }

    public function show(Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        return view('inventario.edit', compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $validated = $request->validate([
            'producto_id' => 'required|integer',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'nullable|date',
            'cantidad' => 'required|integer',
            'descripcion' => 'nullable',
        ]);

        $inventario->update($validated);
        return redirect()->route('inventario.index');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventario.index');
    }
}
