<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('proveedores.index', [
            'proveedores' => Proveedor::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'nombre_contacto' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
          
        ]);
        
        Proveedor::create($validated);
        
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'nombre_contacto' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
          
        ]);
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }


    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
          
        $proveedor->delete();
        
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
