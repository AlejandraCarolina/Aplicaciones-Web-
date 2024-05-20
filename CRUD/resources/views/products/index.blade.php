<x-app-layout>
    <!-- Encabezado de la página "Listado Productos" -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Productos') }}
        </h2>
    </x-slot>

    <!-- Contenedor principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mostrar mensaje de éxito si existe -->
                    @session('success')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession

                    <!-- Contenedor del listado de productos -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <!-- Titulo del listado -->
                        <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-700">
                            Lista de productos
                        </div>
                        <div class="p-4">
                            <!-- Botón para agregar un nuevo producto -->
                            <a href="{{ route('products.create') }}"
                                class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition duration-150 my-2">
                                <i class="bi bi-plus-circle mr-1"></i> Agregar un producto
                            </a>
                            <!-- Tabla de productos -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Código</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!-- Iterar sobre los productos -->
                                        @forelse ($products as $product)
                                            <tr>
                                                <!-- Mostrar la información del producto -->
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->code }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->quantity }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <!-- Formulario para acciones como editar, mostrar y eliminar -->
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- Botón de acción: MOSTRAR -->
                                                        <a href="{{ route('products.show', $product->id) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-gray-500 text-white text-xs font-medium rounded hover:bg-yellow-600 transition duration-150">
                                                            <i class="bi bi-eye mr-1"></i> Mostrar
                                                        </a>
                                                         <!-- Botón de acción: EDITAR -->
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition duration-150">
                                                            <i class="bi bi-pencil-square mr-1"></i> Editar
                                                        </a>
                                                         <!-- Botón de acción: ELIMINAR -->
                                                        <button type="submit"
                                                            class="inline-flex items-center px-2 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition duration-150"
                                                            onclick="return confirm('¿Está seguro que desea eliminar este producto?');">
                                                            <i class="bi bi-trash mr-1"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                          
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!--  productos -->
                            <div class="mt-4">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
