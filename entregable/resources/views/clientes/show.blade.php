<!-- resources/views/clientes/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">ID:</label>
                        <p>{{ $cliente->id_cliente }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Nombre:</label>
                        <p>{{ $cliente->nombre }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Correo Electrónico:</label>
                        <p>{{ $cliente->correo }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Código Postal:</label>
                        <p>{{ $cliente->codigo_postal }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Regimén Fiscal:</label>
                        <p>{{ $cliente->regimen_fiscal }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Razón Social:</label>
                        <p>{{ $cliente->razon_social }}</p>
                    </div>    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Dirección:</label>
                        <p>{{ $cliente->direccion }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">RFC:</label>
                        <p>{{ $cliente->rfc }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Teléfono:</label>
                        <p>{{ $cliente->telefono }}</p>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
