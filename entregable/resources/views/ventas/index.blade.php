<!-- resources/views/ventas/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Ventas') }}
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
                            Lista de ventas
                        </div>
                        <div class="p-4">
                            <a href="{{ route('ventas.create') }}"
                                class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition duration-150 my-2">
                                <i class="bi bi-plus-circle mr-1"></i> Agregar una venta
                            </a>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Producto</th>
                                           <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Categoría</th> --> 
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cliente</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha de Venta</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subtotal</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                IVA</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Total</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($ventas as $venta)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->producto->nombre }}</td>
                                                <!--<td class="px-6 py-4 whitespace-nowrap">{{ $venta->categoria->nombre }}</td>-->
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->cliente->nombre }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->fecha_venta }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->subtotal }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->iva }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $venta->total }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('ventas.show', $venta->id_venta) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-gray-500 text-white text-xs font-medium rounded hover:bg-yellow-600 transition duration-150">
                                                            <i class="bi bi-eye mr-1"></i> Mostrar
                                                        </a>
                                                        <a href="{{ route('ventas.edit', $venta->id_venta) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition duration-150">
                                                            <i class="bi bi-pencil-square mr-1"></i> Editar
                                                        </a>
                                                        <button type="submit"
                                                            class="inline-flex items-center px-2 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition duration-150"
                                                            onclick="return confirm('¿Está seguro que desea eliminar esta venta?');">
                                                            <i class="bi bi-trash mr-1"></i> Eliminar
                                                        </button>
                                                        <a href="{{ route('ventas.pdf', $venta->id_venta) }}"
                                                            class="inline-flex items-center px-2 py-1 bg-gray-500 text-white text-xs font-medium rounded hover:bg-purple-600 transition duration-150">
                                                            <i class="bi bi-file-earmark-pdf mr-1"></i> PDF
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="px-6 py-4 whitespace-nowrap text-center">No hay ventas disponibles.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $ventas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
