<?php


namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compra::paginate(10); // paginación
        return view('compras.index', compact('compras'));
    }

    public function generatePDF($id)
    {
        $compra = Compra::findOrFail($id);
        $pdf = PDF::loadView('compras.pdf', compact('compra'));
        return $pdf->download('compra_'.$id.'.pdf');
    }

    public function create()
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all(); 
        
        // Obtener todos los productos
        $productos = Producto::all(); 
        
        return view('compras.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proveedor_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric',
        ]);

        Compra::create($validated);
        return redirect()->route('compras.index');
    }

    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all(); 
        
        // Obtener todos los productos
        $productos = Producto::all(); 
        
        return view('compras.edit', compact('compra', 'proveedores', 'productos'));
    }

    public function update(Request $request, Compra $compra)
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric',
        ]);

        $compra->update($validated);
        return redirect()->route('compras.index');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
