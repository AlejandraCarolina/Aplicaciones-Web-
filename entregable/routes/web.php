<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Htpp\Controllers\PagosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\CotizacionesController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('products', ProductoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('productos', ProductoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('inventario', InventarioController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores',ProveedorController::class);
    Route::resource('compras',App\Http\Controllers\ComprasController::class);
    Route::resource('pagos',App\Http\Controllers\PagosController::class);
    Route::resource('vendedores',VendedoresController::class);
    Route::resource('cotizaciones',App\Http\Controllers\CotizacionesController::class);
   
    Route::get('/clientes/{id}/pdf', [ClienteController::class, 'generatePDF'])->name('clientes.pdf');
    Route::get('/inventario/{id}/pdf', [InventarioController::class, 'generatePDF'])->name('inventario.pdf');
    Route::get('ventas/{id}/pdf', [VentaController::class, 'generatePDF'])->name('ventas.pdf');
    Route::get('compras/{id}/pdf', [ComprasController::class, 'generatePDF'])->name('compras.pdf');




    

});

require __DIR__.'/auth.php';

?>
