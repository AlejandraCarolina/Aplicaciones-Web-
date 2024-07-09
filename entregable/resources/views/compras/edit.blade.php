<!-- resources/views/inventario/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('compras.update', $compra->id_compra) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                     
                        <label for="proveedor_id" class="block text-gray-700 font-bold">Proveedor:</label>
                            <select id="proveedor_id" name="proveedor_id" class="w-full border-gray-300 rounded" required>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>

                            <label for="producto_id" class="block text-gray-700 font-bold">Producto:</label>
                            <select id="producto_id" name="producto_id" class="w-full border-gray-300 rounded" required>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 font-bold">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="w-full border-gray-300 rounded" value="{{ $compra->cantidad}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="precio" class="block text-gray-700 font-bold">Precio:</label>
                            <input type="number" id="precio" name="precio" class="w-full border-gray-300 rounded" value="{{ $compra->precio}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_compra" class="block text-gray-700 font-bold">Fecha de compra:</label>
                            <input type="date" id="fecha_compra" name="fecha_compra" class="w-full border-gray-300 rounded" value="{{ $compra->fecha_compra}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="descuento" class="block text-gray-700 font-bold">Descuento:</label>
                            <input type="number" id="descuento" name="descuento" class="w-full border-gray-300 rounded" value="{{ $compra->descuento}}" required>
                        </div>
                   
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
