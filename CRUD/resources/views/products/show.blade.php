<x-app-layout>

   <!-- <espacio> -->
    <br/>

    <!-- Contenedor principal -->
    <div class="flex justify-center mt-3">
        <div class="w-full max-w-2xl">

            <!-- Mostrar la información del producto -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <!-- Botón de regresar -->
                <div class="bg-gray-100 px-4 py-2 flex justify-between items-center">
                    <div class="font-semibold text-gray-700">
                        Información del Producto
                    </div>
                    <!-- Botón para regresar al listado de productos -->
                    <div>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 transition duration-150">
                            &larr; Regresar
                        </a>
                    </div>
                </div>
                
                <div class="p-4">
                    <!-- Mostrar código del producto -->
                    <div class="mb-4 flex">
                        <label for="code" class="w-1/3 font-semibold text-gray-700">Código:</label>
                        <div class="w-2/3">
                            {{ $product->code }}
                        </div>
                    </div>

                    <!-- Mostrar nombre del producto -->
                    <div class="mb-4 flex">
                        <label for="name" class="w-1/3 font-semibold text-gray-700">Nombre:</label>
                        <div class="w-2/3">
                            {{ $product->name }}
                        </div>
                    </div>

                    <!-- Mostrar la cantidad del producto -->
                    <div class="mb-4 flex">
                        <label for="quantity" class="w-1/3 font-semibold text-gray-700">Cantidad:</label>
                        <div class="w-2/3">
                            {{ $product->quantity }}
                        </div>
                    </div>

                    <!-- Mostrar el precio del producto -->
                    <div class="mb-4 flex">
                        <label for="price" class="w-1/3 font-semibold text-gray-700">Precio:</label>
                        <div class="w-2/3">
                            {{ $product->price }}
                        </div>
                    </div>

                    <!-- Mostrar la descripción del producto -->
                    <div class="mb-4 flex">
                        <label for="description" class="w-1/3 font-semibold text-gray-700">Descripción:</label>
                        <div class="w-2/3">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
