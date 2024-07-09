<?php


namespace App\Http\Controllers;
use App\Models\Vendedor;

use Illuminate\Http\Request;

class VendedoresController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::paginate(10); // paginación
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);

        Vendedor::create($validated);
        return redirect()->route('vendedores.index');
    }

    public function show(Vendedor $vendedor)
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedor $vendedor)
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request,Vendedor $vendedor)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);

        $vendedor->update($validated);
        return redirect()->route('vendedores.index');
    }

    public function destroy(Vendedor $vendedor)
{
    // Borrar tipo de método
    $vendedor->delete();
    
    return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado exitosamente.');
}
}
