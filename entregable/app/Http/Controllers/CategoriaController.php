<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(10); // paginación
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
        ]);

        Categoria::create($validated);
        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required',
        ]);

        $categoria->update($validated);
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
{
    // Verificar si hay productos asociados a esta categoría
    if ($categoria->productos()->exists()) {
        return redirect()->back()->with('error', 'No se puede eliminar la categoría porque hay productos asociados a ella.');
    }

    // Si no hay productos asociados, proceder con la eliminación de la categoría
    $categoria->delete();
    
    return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
}

}
