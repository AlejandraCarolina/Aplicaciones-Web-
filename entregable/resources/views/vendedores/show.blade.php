<!-- resources/views/categorias/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Vendedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">ID Vendedor:</label>
                        <p>{{ $vendedor->id_vendedor }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Nombre Vendedor:</label>
                        <p>{{ $vendedor->nombre }}</p>

                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Correo electrónico:</label>
                        <p>{{ $vendedor->correo }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Teléfono:</label>
                        <p>{{ $vendedor->telefono }}</p>
                    </div>
                    <a href="{{ route('vendedores.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-xs font-medium rounded hover:bg-gray-600 transition duration-150">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
