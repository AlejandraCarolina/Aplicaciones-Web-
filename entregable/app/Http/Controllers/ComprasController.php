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
}
