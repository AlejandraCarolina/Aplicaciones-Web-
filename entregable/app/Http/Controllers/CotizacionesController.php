<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::paginate(10);
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('cotizaciones.create', compact('productos', 'clientes'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cliente_id' => 'required',
            'fecha_cot' => 'required|date',
            'vigencia' => [
                'required',
                'date',
                Rule::requiredIf(function () use ($request) {
                    $fechaCotizacion = new \DateTime($request->fecha_cot);
                    $fechaVigencia = new \DateTime($request->vigencia);
                    $diff = $fechaCotizacion->diff($fechaVigencia);
                    return $diff->days !== 12;
                }),
            ],
            'cantidad' => 'required|integer',
            'comentarios' => 'nullable|string',
        ]);

        Cotizacion::create($request->all());

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización creada exitosamente.');
    }


    public function show(Cotizacion $cotizacion)
    {
      
        $producto = $cotizacion->producto; 
        $cliente = $cotizacion->cliente; 

        return view('cotizaciones.show', compact('cotizacion'));
    }

    public function edit(Cotizacion $cotizacione)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('cotizaciones.edit', compact('cotizacione', 'productos', 'clientes'));
    }

    public function update(Request $request, Cotizacion $cotizacione)
    {
        $validated = $request->validate([
            'producto_id' => 'required',
            'cliente_id' => 'required',
            'fecha_cot' => 'required',
            'vigencia' => 'required',
            'cantidad' => 'required', 
            'comentarios' => 'nullable',
        ]);

        $cotizacione->update($validated);
        return redirect()->route('cotizaciones.index');
    }

    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();
        return redirect()->route('cotizaciones.index');
    }
}
