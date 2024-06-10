<!-- resources/views/ventas/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="producto_id" class="block text-gray-700 font-bold">Producto:</label>
                            <select id="producto_id" name="producto_id" class="w-full border-gray-300 rounded" required>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="categoria_id" class="block text-gray-700 font-bold">Categoría:</label>
                            <select id="categoria_id" name="categoria_id" class="w-full border-gray-300 rounded" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="cliente_id" class="block text-gray-700 font-bold">Cliente:</label>
                            <select id="cliente_id" name="cliente_id" class="w-full border-gray-300 rounded" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_venta" class="block text-gray-700 font-bold">Fecha de Venta:</label>
                            <input type="date" id="fecha_venta" name="fecha_venta" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="subtotal" class="block text-gray-700 font-bold">Subtotal:</label>
                            <input type="text" id="subtotal" name="subtotal" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="iva" class="block text-gray-700 font-bold">IVA:</label>
                            <input type="text" id="iva" name="iva" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="total" class="block text-gray-700 font-bold">Total:</label>
                            <input type="text" id="total" name="total" class="w-full border-gray-300 rounded" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
