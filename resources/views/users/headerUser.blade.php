<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 shadow-md">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <!-- Brand -->
        <a href="{{ route('perfilUser') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-blue-600">Mi Perfil</span>
        </a>

        <!-- Links -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 text-gray-700 font-medium">
                <li>
                    <a href="{{ route('perfilUser') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('reservas.reservasUser') }}" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0">Ver Reservas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
