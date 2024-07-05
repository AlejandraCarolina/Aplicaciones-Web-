<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
    {
        $compra = Compras::paginate(10);
        return view('compras.index', [
            'compras' => $compra
        ]);
    }

    public function create()
    {
        $productos = Producto::with('category')->get(); // Obtener todos los productos con sus categorías
        return view('compras.create', compact('compras')); // Pasar los productos a la vista
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'compras_id' => 'required|integer'
       
        ]);

        Compra::create($validated);
        return redirect()->route('compras.index');
    }

}
