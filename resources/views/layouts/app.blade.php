<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">

    <title>@yield('title')</title>
    <style>
        body {
            /* background-color: #76A9FA;
            margin: 0;
            padding: 0; */
            background-image: url("https://media.timeout.com/images/102747673/image.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(5px);
            opacity: 0.9;
        }
        .hidden {
            display: none;
            }
        .grayscale {
            filter: grayscale(100%);
        }
    </style>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">
    
    <div class="flex flex-row" class="min-h-screen bg-gray-100">
        <nav class="w-1/4">
            @include('layouts.navigation')
        </nav>
        <div class="w-3/4">
            <!-- contenido del perfil -->
            @yield('content')
        </div>
    </div>

    <main>

    </main>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />

</body>

</html>