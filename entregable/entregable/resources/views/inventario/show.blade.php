<!-- resources/views/inventario/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>ID: {{ $inventario->id_inventario }}</p>
                    <p>Producto: {{ $inventario->producto->nombre }}</p>
                    <p>Fecha de Entrada: {{ $inventario->fecha_entrada }}</p>
                    <p>Fecha de Salida: {{ $inventario->fecha_salida }}</p>
                    <p>Cantidad: {{ $inventario->cantidad }}</p>
                    <p>Descripción: {{ $inventario->descripcion }}</p>
                    <a href="{{ route('inventario.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
