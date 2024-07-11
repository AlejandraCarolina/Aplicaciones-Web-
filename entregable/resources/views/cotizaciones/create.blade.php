
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cotizacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cotizaciones.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">

                        <label for="producto_id" class="block text-gray-700 font-bold">Producto:</label>
                            <select id="producto_id" name="producto_id" class="w-full border-gray-300 rounded" required>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>

                            <label for="cliente_id" class="block text-gray-700 font-bold">Cliente:</label>
                            <select id="cliente_id" name="cliente_id" class="w-full border-gray-300 rounded" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>

                        </div>
                        
                        <div class="mb-4">
                            <label for="fecha_cot" class="block text-gray-700 font-bold">Fecha Cotización:</label>
                            <input type="date" id="fecha_cot" name="fecha_cot" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="vigencia" class="block text-gray-700 font-bold">Vigencia Cotización:</label>
                            <input type="date" id="vigencia" name="vigencia" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 font-bold">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="w-full border-gray-300 rounded" required>
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
</x-app-layout>
