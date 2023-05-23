@extends("layouts.app")
@section('title', 'Productos')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                        <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">

                            <div class="flex items-center justify-between pb-4">
                                <a href="/products/create">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir Producto</button>
                                </a>
                            </div> 

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre del Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Subcategoria
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Stock
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Acción
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td>
                                                <img class="rounded-t-lg" id="image" src="{{$product->image_link}}" alt="imagen del producto{{$product->name}}">
                                            </td>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$product->name}}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$product->id}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$product->subcategory->name}}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${{$product->price}}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($product->hasStock)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="products/{{$product->id}}" id="seeMore" type="button"class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Ver Más</a>
                                            </td>
                                        </tr>                              
                                    @endforeach
                                </tbody>
                            </table>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
