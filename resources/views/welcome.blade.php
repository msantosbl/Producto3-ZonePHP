<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10 text-center">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold mb-2">Bienvenido al perfil administrador</h1>
            <p class="text-lg">¿Que deseas hacer hoy?</p>
        </div>

        <!-- Navigation Buttons -->
        <div class="mt-8 space-y-4 md:space-y-0 md:flex md:space-x-6 justify-center">
            <a href="{{ route('usuarios.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6.001 6.001 0 0112 4a6.001 6.001 0 016.879 13.804M7 20h10m-5-3v3" />
                </svg>
                Ver Usuarios
            </a>

            <a href="{{ route('reservas.view') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Ver Reservas
            </a>

            <a href="{{ route('reservas.hotelToAirport') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 001-1V7a1 1 0 00-1-1H5a1 1 0 00-1 1v12a1 1 0 001 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                </svg>
                Reservar Hotel al Aeropuerto
            </a>
            <a href="{{ route('reservas.aeropuertoHotel') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 001-1V7a1 1 0 00-1-1H5a1 1 0 00-1 1v12a1 1 0 001 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                </svg>
                Reservar Aeropuerto al Hotel
            </a>
            <!-- Cerrar Sesión -->
            <a href="/login" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 -3 25 25" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v7m0 0l3-3m-3 3l-3-3m1 7a7 7 0 100-14 7 7 0 000 14z" />
                </svg>
                Cerrar Sesión
            </a>

        </div>
     </div>


    @vite('resources/js/app.js')
    
</body>
</html>
