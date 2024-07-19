<?php

// app/Http/Controllers/ClienteController.php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10); // paginación
        return view('clientes.index', compact('clientes'));
    }

    public function generatePDF($id)
    {
        // Obtener el cliente por ID
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente no encontrado');
        }

        // Pasar los datos del cliente a la vista
        $pdf = Pdf::loadView('clientes.pdf', compact('cliente'));

        // Descargar el PDF
        return $pdf->download('cliente_' . $cliente->id_cliente . '.pdf');
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'codigo_postal' => 'required',
            'regimen_fiscal' => 'required',
            'razon_social' => 'required',
            'direccion' => 'required',
            'rfc' => 'required',
            'telefono' => 'required',
        ]);

        Cliente::create($validated);
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'codigo_postal' => 'required',
            'regimen_fiscal' => 'required',
            'razon_social' => 'required',
            'direccion' => 'required',
            'rfc' => 'required',
            'telefono' => 'required',
        ]);

        $cliente->update($validated);
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
