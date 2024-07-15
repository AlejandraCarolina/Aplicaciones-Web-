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
                            <label for="movimiento" class="block text-gray-700 font-bold">Movimiento:</label>
                            <select id="movimiento" name="movimiento" class="w-full border-gray-300 rounded" required>
                                <option value="">Seleccione un movimiento</option>
                                <option value="entrada">Entrada</option>
                                <option value="salida">Salida</option>
                            </select>
                        </div>

                        <div id="fecha_entrada_div" class="mb-4" style="display: none;">
                            <label for="fecha_entrada" class="block text-gray-700 font-bold">Fecha de Entrada:</label>
                            <input type="date" id="fecha_entrada" name="fecha_entrada" class="w-full border-gray-300 rounded">
                        </div>

                        <div id="fecha_salida_div" class="mb-4" style="display: none;">
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const movimientoSelect = document.getElementById('movimiento');
        const fechaEntradaDiv = document.getElementById('fecha_entrada_div');
        const fechaSalidaDiv = document.getElementById('fecha_salida_div');

        function toggleFechaFields() {
            const selectedValue = movimientoSelect.value;
            if (selectedValue === 'entrada') {
                fechaEntradaDiv.style.display = 'block';
                fechaSalidaDiv.style.display = 'none';
            } else if (selectedValue === 'salida') {
                fechaEntradaDiv.style.display = 'none';
                fechaSalidaDiv.style.display = 'block';
            } else {
                fechaEntradaDiv.style.display = 'none';
                fechaSalidaDiv.style.display = 'none';
            }
        }

        movimientoSelect.addEventListener('change', toggleFechaFields);

        // Inicializa el estado de los campos de fecha al cargar la página
        toggleFechaFields();
    });
    </script>
</x-app-layout>
