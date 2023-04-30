@extends("layouts.app")
@section('title', 'Products')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
            </div>
            @section('content')
            <h1>Categorías</h1>

            <ul>
                @foreach ($categories as $category)
                <li>{{ $category->name }}</li>
                @endforeach
            </ul>
            @endsection
        </div>
    </div>
</div>
@endsection