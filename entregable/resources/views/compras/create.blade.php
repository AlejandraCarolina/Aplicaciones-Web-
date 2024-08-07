<!-- resources/views/inventario/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('compras.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="proveedor_id" class="block text-gray-700 font-bold">Proveedor:</label>
                            <select id="proveedor_id" name="proveedor_id" class="w-full border-gray-300 rounded" required>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="productos-container">
                           <!-- productos -->
                        </div>

                        <div class="mb-4">
                            <button type="button" id="add-producto" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mb-4">Agregar Producto</button>
                        </div>

                        <div class="mb-4">
                            <label for="fecha_compra" class="block text-gray-700 font-bold">Fecha de compra:</label>
                            <input type="date" id="fecha_compra" name="fecha_compra" class="w-full border-gray-300 rounded" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Establecer la fecha actual en el campo de fecha
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_compra').value = today;

            // Agregar funcionalidad para el botón "Agregar Producto"
            document.getElementById('add-producto').addEventListener('click', function() {
                var container = document.getElementById('productos-container');
                var newProductGroup = document.createElement('div');
                newProductGroup.classList.add('producto-group', 'mb-4');
                newProductGroup.innerHTML = `
                    <div class="mb-2">
                        <label class="block text-gray-700 font-bold">Producto:</label>
                        <select name="productos[]" class="w-full border-gray-300 rounded" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 font-bold">Cantidad:</label>
                        <input type="number" name="cantidades[]" class="w-full border-gray-300 rounded" placeholder="Cantidad" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 font-bold">Elige una opción:</label>
                        <select name="precio_opciones[]" class="w-full border-gray-300 rounded precio-opcion" required>
                            <option value="mismo">Mismo precio</option>
                            <option value="actualizar">Actualizar precio</option>
                        </select>
                    </div>
                    <div class="mb-2 precio-campos" style="display: none;">
                        <label class="block text-gray-700 font-bold">Precio Venta:</label>
                        <input type="number" name="precio_venta[]" class="w-full border-gray-300 rounded" placeholder="Precio Venta">
                        <label class="block text-gray-700 font-bold mt-2">Precio Compra:</label>
                        <input type="number" name="precio_compra[]" class="w-full border-gray-300 rounded" placeholder="Precio Compra">
                    </div>
                `;
                container.appendChild(newProductGroup);

                newProductGroup.querySelector('.precio-opcion').addEventListener('change', function() {
                    var precioCampos = this.closest('.producto-group').querySelector('.precio-campos');
                    if (this.value === 'actualizar') {
                        precioCampos.style.display = 'block';
                    } else {
                        precioCampos.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-app-layout>
