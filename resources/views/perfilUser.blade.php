<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Incluir el header -->
    @include('users.headerUser')

    <div class="container mx-auto mt-10 text-center">
        <!-- Head -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold mb-2">Bienvenido, {{ $nombre ?? 'Usuario' }}</h1>
            <p class="text-lg">Gestiona tus acciones desde este panel.</p>
        </div>

        <!-- Navigation Buttons -->
        <div class="mt-8 space-y-4 md:space-y-0 md:flex md:space-x-6 justify-center">
            <!-- Editar Perfil -->
            <a href="/editarPerfil" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 -3 30 30" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                Editar Perfil
            </a>

            <!-- Mis Reservas -->
            <a href="/reservasUser" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14" />
                </svg>
                Ver Reservas
            </a>

            <!-- Realizar Reserva -->
            <a href="#" id="reservationButton" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14" />
                </svg>
                Realizar Reserva
            </a>

            <!-- Modal -->
            <div id="reservationModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h2 class="text-lg font-bold mb-4 text-gray-700">Seleccione el tipo de reserva</h2>
                    <div class="flex flex-col gap-4">
                        <button id="optionAirportToHotel" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            Aeropuerto a Hotel
                        </button>
                        <button id="optionHotelToAirport" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                            Hotel a Aeropuerto
                        </button>
                    </div>
                    <button id="closeModal" class="mt-4 text-gray-500 hover:text-gray-700">Cancelar</button>
                </div>
            </div>

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

<!-- Footer -->
@include('plantilla.footer')

<!-- Codigo JavaScript para el Modal -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Obtener elementos
        const reservationButton = document.getElementById('reservationButton');
        const reservationModal = document.getElementById('reservationModal');
        const closeModal = document.getElementById('closeModal');

        // Botones de opciones
        const optionAirportToHotel = document.getElementById('optionAirportToHotel');
        const optionHotelToAirport = document.getElementById('optionHotelToAirport');
        const optionBoth = document.getElementById('optionBoth');

        // Mostrar el modal
        reservationButton.addEventListener('click', (event) => {
            event.preventDefault();
            reservationModal.classList.remove('hidden');
        });

        // Cerrar el modal
        closeModal.addEventListener('click', () => {
            reservationModal.classList.add('hidden');
        });

        // Redirigir según la selección
        optionAirportToHotel.addEventListener('click', () => {
            window.location.href = '/aeropuertoHotelUser';
        });

        optionHotelToAirport.addEventListener('click', () => {
            window.location.href = '/hotelAeropuertoUser';  
        });
    });
        //TEST
        var tipoUsuario = "{{ Auth::user()->tipo_usuario }}";
        console.log(tipoUsuario); // Ver el valor en la consola
</script>

