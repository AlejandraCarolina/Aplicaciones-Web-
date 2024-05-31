<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View; // Asegúrate de importar la clase correcta

class ProductoController extends Controller
{
    // Método para mostrar la vista de la lista de productos
    public function index(): View
    {
        return view('productos.index', [
            'productos' => Producto::latest()->paginate(4)
        ]);
    }

    public function create(): View
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
            'categoria_id' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'fecha_venta' => 'nullable|date',
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto): View
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto): View
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
            'categoria_id' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'fecha_venta' => 'nullable|date',
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
