<!-- resources/views/productos/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="w-full border-gray-300 rounded" required>
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
                            <label for="cantidad" class="block text-gray-700 font-bold">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="precio_venta" class="block text-gray-700 font-bold">Precio Venta:</label>
                            <input type="text" id="precio_venta" name="precio_venta" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="precio_compra" class="block text-gray-700 font-bold">Precio Compra:</label>
                            <input type="text" id="precio_compra" name="precio_compra" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 font-bold">Color:</label>
                            <input type="text" id="color" name="color" class="w-full border-gray-300 rounded">
                        </div> 
                        <div class="mb-4">
                            <label for="descripcion_corta" class="block text-gray-700 font-bold">Descripción Corta:</label>
                            <textarea id="descripcion_corta" name="descripcion_corta" class="w-full border-gray-300 rounded"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion_larga" class="block text-gray-700 font-bold">Descripción Larga:</label>
                            <textarea id="descripcion_larga" name="descripcion_larga" class="w-full border-gray-300 rounded"></textarea>
                        </div>
                      
                        <div class="mb-4">
                            <label for="fecha_compra" class="block text-gray-700 font-bold">Fecha de Compra:</label>
                            <input type="date" id="fecha_compra" name="fecha_compra" class="w-full border-gray-300 rounded">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
