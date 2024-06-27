<?php


namespace App\Http\Controllers;
use App\Models\Pago;

use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index()
    {
        $pagos = Pago::paginate(10); // paginación
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required',
        ]);

        Pago::create($validated);
        return redirect()->route('pagos.index');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'tipo' => 'required',
        ]);

        $pago->update($validated);
        return redirect()->route('pagos.index');
    }

    public function destroy(Pago $pago)
{
    // Borrar tipo de método
    $pago->delete();
    
    return redirect()->route('pagos.index')->with('success', 'Método de pago eliminado exitosamente.');
}
}
