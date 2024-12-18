<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonePhp - Menú</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 shadow-md">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <!-- Brand -->
        <a href="/" class="flex items-center">
            {{-- <img src="https://via.placeholder.com/40" class="h-8 mr-3" alt="ZonePhp Logo"> --}}
            <span class="self-center text-xl font-semibold whitespace-nowrap text-blue-600">ZonePhp</span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 md:hidden" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
            </svg>
        </button>

        <!-- Links -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 text-gray-700 font-medium">
                <li>
                    <a href="{{ url('/welcome') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Inicio</a>
                </li>
                <li>
                    <a href="{{ url('/hoteles') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Hoteles</a>
                </li>
                <li>
                    <a href="{{ url('/reservas') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Reservas</a>
                </li>
                <li>
                    <a href="{{ url('/perfilAdministrador') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Usuarios</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
