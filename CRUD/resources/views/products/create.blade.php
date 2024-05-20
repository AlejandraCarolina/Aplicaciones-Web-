<x-app-layout>
    <!-- Contenedor principal -->
    <div class="flex justify-center mt-3">
        <div class="w-full max-w-2xl">
            <!--  formulario -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <!-- Botón de regreso -->
                <div class="bg-gray-100 px-4 py-2 flex justify-between items-center">
                    <div class="font-semibold text-gray-700">
                        Añadir Producto
                    </div>
                    <!-- Botón para regresar al listado de productos -->
                    <div>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 transition duration-150">
                            &larr; Regresar
                        </a>
                    </div>
                </div>
                <!-- Formulario para agregar un nuevo producto -->
                <div class="p-4">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf

                        <!-- Campo para el código del producto -->
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Código</label>
                            <div class="mt-1">
                                <input type="text" id="code" name="code" value="{{ old('code') }}" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('code') border-red-500 @enderror">
                                @error('code')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo para el nombre del producto -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo para la cantidad del producto -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <div class="mt-1">
                                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('quantity') border-red-500 @enderror">
                                @error('quantity')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo para el precio del producto -->
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <div class="mt-1">
                                <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror">
                                @error('price')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo para la descripción del producto -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón para enviar el formulario -->
                        <div class="mb-4 flex justify-center">
                            <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-150" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
