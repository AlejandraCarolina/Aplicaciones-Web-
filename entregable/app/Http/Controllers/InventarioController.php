<?php

// app/Http/Controllers/InventarioController.php
namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InventarioController extends Controller
{
    
    public function index()
    {
        $inventario = Inventario::paginate(10);
        return view('inventario.index', [
            'inventario' => $inventario
        ]);
    }


    public function create()
    {
        $productos = Producto::with('category')->get(); // Obtener todos los productos con sus categorías
        return view('inventario.create', compact('productos')); // Pasar los productos a la vista
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

    public function show(Inventario $inventario)//vista show
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)//vista editar
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
