<?php


namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Categoria;
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
        $productos = Producto::all();
        $clientes = Cliente::all();
        $categorias = Categoria::all();

        return view('ventas.create', compact('productos', 'clientes', 'categorias'));

        
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

        $productos = Producto::all();
        $clientes = Cliente::all();
        $categorias = Categoria::all();

        return view('ventas.edit', compact('venta', 'productos', 'clientes', 'categorias'));
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
