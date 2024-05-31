<!-- resources/views/clientes/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="direccion" class="block text-gray-700 font-bold">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="rfc" class="block text-gray-700 font-bold">RFC:</label>
                            <input type="text" id="rfc" name="rfc" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 font-bold">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" class="w-full border-gray-300 rounded" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
