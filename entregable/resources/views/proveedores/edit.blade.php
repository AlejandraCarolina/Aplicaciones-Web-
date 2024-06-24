
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-bold">Nombre Proveedor:</label>
                            <input type="text" id="nombre" name="nombre" class="w-full border-gray-300 rounded" value="{{$proveedor->nombre}}" required >
                        </div>
                        <div class="mb-4">
                            <label for="nombre_contacto" class="block text-gray-700 font-bold">Nombre Contacto:</label>
                            <input type="text" id="nombre_contacto" name="nombre_contacto" class="w-full border-gray-300 rounded" value="{{$proveedor->nombre_contacto}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="correo" class="block text-gray-700 font-bold">Correo Electrónico:</label>
                            <input type="email" id="correo" name="correo" class="w-full border-gray-300 rounded" value="{{$proveedor->correo}}" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 font-bold">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" class="w-full border-gray-300 rounded" value="{{$proveedor->telefono}}" required>
                        </div>
                       
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
