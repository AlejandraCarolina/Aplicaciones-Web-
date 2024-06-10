<?php

// app/Http/Controllers/VentaController.php
namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::paginate(10); // paginación
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'fecha_venta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Venta::create($validated);
        return redirect()->route('ventas.index');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $validated = $request->validate([
            'producto_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'fecha_venta' => 'required|date',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $venta->update($validated);
        return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
