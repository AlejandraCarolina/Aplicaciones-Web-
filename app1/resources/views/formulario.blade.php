<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Alta de productos') }}
                    <div class="float-end">
                        <a href="productos" class="btn btn-primary btn-sm">&larr;
                            Back</a>
                    </div>
                </div>
            </div>
        </div>

        <br />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">

                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" class="max-w-sm mx-auto">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="code"
                                                class="col-md-4 col-form-label text-md-end text-start">Code</label>
                                            <div class="col-md-6">
                                                <input type="text"
                                                    class="form-control @error('code') is-invalid @enderror"
                                                    id="code" name="code" value="{{ old('code') }}">
                                                @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                            <div class="col-md-6">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="quantity"
                                                class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                                            <div class="col-md-6">
                                                <input type="number"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    id="quantity" name="quantity" value="{{ old('quantity') }}">
                                                @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="price"
                                                class="col-md-4 col-form-label text-md-end text-start">Price</label>
                                            <div class="col-md-6">
                                                <input type="number" step="0.01"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    id="price" name="price" value="{{ old('price') }}">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="description"
                                                class="col-md-4 col-form-label text-md-end text-start">Description</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <input type="submit"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                                value="Add Product">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
