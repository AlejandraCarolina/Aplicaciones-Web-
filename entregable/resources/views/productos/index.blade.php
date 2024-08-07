<!-- resources/views/productos/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-700">
                            Lista de productos
                        </div>
                        <div class="p-4">
                            <a href="{{ route('productos.create') }}"
                                class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition duration-150 my-2">
                                <i class="bi bi-plus-circle mr-1"></i> Agregar un producto
                            </a>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Categoría</th>    
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio Venta</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio Compra</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Color</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Descripción Corta</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Descripción Larga</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha Compra</th>   
                                            <!--<th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Imagen</th>-->
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($productos as $producto)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->nombre }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->category->nombre}}</td> 
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->cantidad }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->precio_venta }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->precio_compra }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->color }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->descripcion_corta }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->descripcion_larga }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->fecha_compra }}</td>
                            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('productos.show', $producto->id_producto) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-gray-500 text-white text-xs font-medium rounded hover:bg-yellow-600 transition duration-150">
                                                            <i class="bi bi-eye mr-1"></i> Mostrar
                                                        </a>
                                                        <a href="{{ route('productos.edit', $producto->id_producto) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition duration-150">
                                                            <i class="bi bi-pencil-square mr-1"></i> Editar
                                                        </a>
                                                        <button type="submit"
                                                            class="inline-flex items-center px-2 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition duration-150"
                                                            onclick="return confirm('¿Está seguro que desea eliminar este producto?');">
                                                            <i class="bi bi-trash mr-1"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center">No hay productos disponibles.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $productos->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
