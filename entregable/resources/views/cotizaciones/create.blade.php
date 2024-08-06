<!-- resources/views/cotizaciones/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cotización') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cotizaciones.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="cliente_id" class="block text-gray-700 font-bold">Cliente:</label>
                            <select id="cliente_id" name="cliente_id" class="w-full border-gray-300 rounded" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="productos-container" class="mb-4">
                            <label class="block text-gray-700 font-bold">Productos:</label>
                            <div class="producto-group mb-2">
                                <select name="productos[]" class="w-full border-gray-300 rounded" required>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="cantidades[]" class="w-full border-gray-300 rounded mt-2" placeholder="Cantidad" required>
                            </div>
                        </div>
                        <button type="button" id="add-producto" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mb-4">Agregar Producto</button>
                        <div class="mb-4">
                            <label for="fecha_cot" class="block text-gray-700 font-bold">Fecha Cotización:</label>
                            <input type="date" id="fecha_cot" name="fecha_cot" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="vigencia" class="block text-gray-700 font-bold">Vigencia Cotización:</label>
                            <input type="date" id="vigencia" name="vigencia" class="w-full border-gray-300 rounded" required readonly>
                        </div>
                        <div class="mb-4">
                            <label for="comentarios" class="block text-gray-700 font-bold">Comentarios:</label>
                            <input type="text" id="comentarios" name="comentarios" class="w-full border-gray-300 rounded" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener la fecha actual del sistema
            var now = new Date();
            var date = now.toISOString().split('T')[0]; // Fecha en formato YYYY-MM-DD

            // Establecer la fecha en el campo correspondiente
            var fechaCot = document.getElementById('fecha_cot');
            var vigencia = document.getElementById('vigencia');

            // Establecer la fecha actual en el campo "Fecha Cotización"
            fechaCot.value = date;

            // Calcular la fecha de vigencia como 10 días después de la fecha actual
            var vigenciaDate = new Date();
            vigenciaDate.setDate(now.getDate() + 10);
            var vigenciaDateStr = vigenciaDate.toISOString().split('T')[0]; // Fecha en formato YYYY-MM-DD

            // Establecer la fecha de vigencia en el campo correspondiente
            vigencia.value = vigenciaDateStr;

            // Agregar funcionalidad para el botón "Agregar Producto"
            document.getElementById('add-producto').addEventListener('click', function() {
                var container = document.getElementById('productos-container');
                var newProductGroup = document.createElement('div');
                newProductGroup.classList.add('producto-group', 'mb-2');
                newProductGroup.innerHTML = `
                    <select name="productos[]" class="w-full border-gray-300 rounded" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="cantidades[]" class="w-full border-gray-300 rounded mt-2" placeholder="Cantidad" required>
                `;
                container.appendChild(newProductGroup);
            });
        });
    </script>
</x-app-layout>
