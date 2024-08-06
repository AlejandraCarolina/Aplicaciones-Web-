<?php

// app/Http/Controllers/ProductoController.php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    // Método para mostrar la vista de la lista de productos
    public function index(): View
    {
        $productos = Producto::with('category')->latest()->paginate(4);
        return view('productos.index', compact('productos'));
    }

    public function create(): View
    {
        $categorias = Categoria::all(); // Obtener categorías
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id_categoria',
            'cantidad' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'color' => 'required',
            'descripcion_corta' => 'nullable',
            'descripcion_larga' => 'nullable',
            'fecha_compra' => 'nullable|date',
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto): View
    {
        $producto->load('category'); // Cargar la relación de categoría
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto): View
    {
        $categorias = Categoria::all(); // Obtener categorías
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id_categoria',
            'cantidad' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'color' => 'required',
            'descripcion_corta' => 'nullable',
            'descripcion_larga' => 'nullable',
            'fecha_compra' => 'nullable|date',
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        // Verificar si hay registros del producto en un inventario
        if ($producto->inventarios()->exists()) {
            return redirect()->back()->with('error', 'No se puede eliminar el producto.');
        }

        // Si no hay inventarios asociados
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
