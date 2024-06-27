<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    public function index()
    {
    $cotizacion = Cotizacion::paginate(10);
        return view('cotizaciones.index', [
            'cotizaciones' => $cotizacion
        ]);
    }
}

