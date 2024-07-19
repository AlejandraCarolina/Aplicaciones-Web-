<?php

// app/Http/Controllers/InventarioController.php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InventarioController extends Controller
{
    
    public function index()
    {
        $inventario = Inventario::paginate(10);
        return view('inventario.index', [
            'inventario' => $inventario
        ]);
    }

    public function generatePDF($id)
    {
        // Obtener el inventario por ID
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return redirect()->back()->with('error', 'Inventario no encontrado');
        }

        // Pasar los datos del inventario a la vista
        $pdf = Pdf::loadView('inventario.pdf', compact('inventario'));

        // Descargar el PDF
        return $pdf->download('inventario_' . $inventario->id . '.pdf');
    }



    public function create()
    {
        $productos = Producto::with('category')->get(); // Obtener todos los productos con sus categorías
        return view('inventario.create', compact('productos')); // Pasar los productos a la vista
    }

public function store(Request $request)
{
    $request->validate([
        'producto_id' => 'required|exists:productos,id_producto',
        'movimiento' => 'required|in:entrada,salida',
        'cantidad' => 'required|integer|min:1',
        'fecha_entrada' => 'nullable|date',
        'fecha_salida' => 'nullable|date',
        'descripcion' => 'nullable|string|max:255',
    ]);

    // Obtener el producto
    $producto = Producto::findOrFail($request->producto_id);
    $cantidad = $request->cantidad;

    // Validar disponibilidad de cantidad en salida
    if ($request->movimiento === 'salida' && $producto->cantidad < $cantidad) {
        return redirect()->back()->withErrors(['cantidad' => 'La cantidad de salida no puede ser mayor a la cantidad disponible en el producto.']);
    }

    // Actualizar cantidad en función del movimiento
    if ($request->movimiento === 'entrada') {
        $producto->cantidad += $cantidad;
    } 
    if ($request->movimiento === 'salida') {
        $producto->cantidad -= $cantidad;
        
    }
 // Guardar cambios en el producto
 $producto->save();

    // Crear registro en la tabla inventario
    
    $inventario = new Inventario();
    $inventario->producto_id = $request->producto_id;
    $inventario->movimiento = $request->movimiento;
    $inventario->cantidad = $cantidad;
    $inventario->descripcion = $request->descripcion;

       

    // Asignar fechas según el tipo de movimiento
    if ($request->movimiento === 'entrada') {
        $inventario->fecha_entrada = $request->fecha_entrada;
        $inventario->fecha_salida = $request->fecha_entrada;  // Asegurar que fecha_salida esté nula en entradas
    } 
    if ($request->movimiento === 'salida') {
        $inventario->fecha_entrada = $request->fecha_entrada; 
        $inventario->fecha_salida = $request->fecha_salida; // Asegurar que fecha_salida esté nula en entradas
    } 

   

    // Intentar guardar el registro de inventario
    try {
        $inventario->save();
    } catch (\Exception $e) {
        // Manejar cualquier error de inserción aquí
        return redirect()->back()->withErrors(['error' => 'Error al guardar el registro en el inventario.']);
    }

    return redirect()->route('inventario.index')->with('success', 'Inventario actualizado exitosamente.');
}



    public function show(Inventario $inventario)//vista show
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)//vista editar
    {
        $productos = Producto::all();
        return view('inventario.edit', compact('inventario','productos'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $validated = $request->validate([
            'producto_id' => 'required|integer',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'nullable|date',
            'cantidad' => 'required|integer',
            'movimiento'    => 'required|string',
            'descripcion' => 'nullable',
        ]);

        $inventario->update($validated);
        return redirect()->route('inventario.index');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventario.index');
    }
}
