@extends("layouts.app")
@section('title', 'Products')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body class="text-center">
    <div class="relative flex items-top justify-center min-h-screen sm:items-top py-4 sm:pt-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-white border-b border-gray-200">  

                        <div class="mb-6 text-center">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Crear Producto</h1>
                        </div>

                        <form method="POST" action="/products/create" enctype="multipart/form-data"> 
                            @csrf

                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="name" id="name" class="product-name bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <div class="mb-6">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <div class="mb-6">
                                <label for="subcategories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subcategoria</label>
                                <select id="subcategories" name="subcategory"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" selected> - </option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach               
                                </select>
                            </div>  
                            <div class="mb-6">        
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Subir Imagen</label> 
                                <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
                            </div>   

                            <div class="flex items-center justify-center pb-4"> 

                                <button type="submit" class="text-white bg-blue-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 mr-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Crear</button> 
  
                                <a href="/products">
                                    <button type="button" id="myButton" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                                </a>
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
