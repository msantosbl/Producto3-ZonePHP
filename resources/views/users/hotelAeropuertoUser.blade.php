<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva: Hotel al Aeropuerto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

</head>
<body class="bg-gray-100">
    
    @if (Auth::check())
        @if (Auth::user()->tipo_usuario == '1')
            <!-- Header para el usuario tipo 1 -->
            @include('users.headerUser')
        @elseif (Auth::user()->tipo_usuario == '2')
            <!-- Header para el usuario tipo 2 -->
            @include('corp.headerCorp')
        @endif
    @endif
    
    <!-- cargar plantilla -->
    @include('plantilla.plantillaReservaHotelaeropuerto')
    
    <!-- Footer -->
    @include('plantilla.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>