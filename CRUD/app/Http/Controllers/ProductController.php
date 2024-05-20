<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; // Importar la clase Request
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
  
    // Método para mostrar la vista de la lista de productos
    public function index(): View 
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(4)
        ]);
    }

    // Método para mostrar la vista de creación de un nuevo producto
    public function create(): View
    {
        return view('products.create');
    }


    // Método para almacenar un nuevo producto en la base de datos
    public function store(Request $request) //Recibe un objeto 'request' que contiene los datos del formulario
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([ 
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        // Crear un nuevo producto utilizando el método create del modelo Product
        Product::create($validatedData); 

        // Redireccionar a la vista de la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Método para mostrar la vista de un producto específico
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    // Método para mostrar la vista de edición de un producto
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    // Método para actualizar un producto en la base de datos
    public function update(Request $request, Product $product) 
    {
        // Validar los datos del formulario de edición
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        // Actualizar los atributos del producto utilizando el método update del objeto $product
        $product->update($validatedData);

        // Redireccionar a la vista de la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Método para eliminar un producto de la base de datos
    public function destroy(Product $product)
    {
        // Eliminar el producto utilizando el método delete del objeto $product
        $product->delete();

        // Redireccionar a la vista de la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
