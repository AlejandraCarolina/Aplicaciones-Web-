<!-- resources/views/productos/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Cotización') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">ID Cotización:</label>
                        <p>{{ $cotizacion->id_cotizacion }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Producto:</label>
                        <p>{{ $producto->producto_id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Cliente:</label>
                        <p>{{ $cliente->cliente_id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Fecha Cotización:</label>
                        <p>{{ $cotizacion->fecha_cot}}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Vigencia:</label>
                        <p>{{ $cotizacion->vigencia}}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Comentarios:</label>
                        <p>{{ $cotizacion->comentarios}}</p>
                    </div>
             
                    <a href="{{ route('cotizaciones.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
