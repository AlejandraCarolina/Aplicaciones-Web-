<!-- resources/views/productos/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">ID:</label>
                        <p>{{ $producto->id_producto }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Nombre:</label>
                        <p>{{ $producto->nombre }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Categoría:</label>
                        <p>{{ $producto->category->nombre}}</p>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Cantidad:</label>
                        <p>{{ $producto->cantidad }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Precio de Venta:</label>
                        <p>{{ $producto->precio_venta }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Precio de Compra:</label>
                        <p>{{ $producto->precio_compra }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Color:</label>
                        <p>{{ $producto->color }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Descripción corta:</label>
                        <p>{{ $producto->descripcion_corta }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Descripción Larga:</label>
                        <p>{{ $producto->descripcion_larga}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Fecha de Compra:</label>
                        <p>{{ $producto->fecha_compra }}</p>
                    </div>
                    <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
