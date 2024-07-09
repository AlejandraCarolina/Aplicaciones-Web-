
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Compras') }}
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
                            Lista de compras
                        </div>
                        <div class="p-4">
                            <a href="{{ route('compras.create') }}"
                                class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition duration-150 my-2">
                                <i class="bi bi-plus-circle mr-1"></i> Agregar una compra
                            </a>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID Proveedor</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID Producto</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha Compra</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Descuento</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($compras as $compra)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->id_compra }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->id_proveedor }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->id_producto }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->cantidad }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->precio }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->fecha_compra }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $compra->descuento }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('compras.destroy', $compra->id_compra) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('compras.edit', $compra->id_compra) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition duration-150">
                                                            <i class="bi bi-pencil-square mr-1"></i> Editar
                                                        </a>
                                                        <button type="submit"
                                                            class="inline-flex items-center px-2 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition duration-150"
                                                            onclick="return confirm('¿Está seguro que desea eliminar esta compra?');">
                                                            <i class="bi bi-trash mr-1"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center">No hay compras disponibles.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $compras->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
