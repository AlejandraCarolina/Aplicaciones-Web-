<!-- resources/views/categorias/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}" class="w-full border-gray-300 rounded" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
