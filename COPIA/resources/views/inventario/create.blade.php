<!-- resources/views/inventario/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('inventario.store') }}" method="POST">
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
                            <label for="fecha_entrada" class="block text-gray-700 font-bold">Fecha de Entrada:</label>
                            <input type="date" id="fecha_entrada" name="fecha_entrada" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_salida" class="block text-gray-700 font-bold">Fecha de Salida:</label>
                            <input type="date" id="fecha_salida" name="fecha_salida" class="w-full border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 font-bold">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 font-bold">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" class="w-full border-gray-300 rounded"></textarea>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
