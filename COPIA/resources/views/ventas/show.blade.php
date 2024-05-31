<!-- resources/views/ventas/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>ID: {{ $venta->id_venta }}</p>
                    <p>Producto: {{ $venta->producto->nombre }}</p>
                    <p>Categoría: {{ $venta->categoria->nombre }}</p>
                    <p>Cliente: {{ $venta->cliente->nombre }}</p>
                    <p>Fecha de Venta: {{ $venta->fecha_venta }}</p>
                    <p>Subtotal: {{ $venta->subtotal }}</p>
                    <p>IVA: {{ $venta->iva }}</p>
                    <p>Total: {{ $venta->total }}</p>
                    <a href="{{ route('ventas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
