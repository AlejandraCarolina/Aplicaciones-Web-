<?php

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
        return view('productos.index', [
            'productos' => Producto::latest()->paginate(4)
        ]);
    }
    
    public function create(): View
    {
        $categorias = Categoria::all(); // obtener categorías
        return view('productos.create', compact('categorias')); 
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

        //verificar si hay registros del producto en un inventario
        if ($producto->inventarios()->exists()) {
            return redirect()->back()->with('error', 'No se puede eliminar el producto.');
        }
    
        // Si no hay inventarios asociados

        $producto->delete();
        
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
