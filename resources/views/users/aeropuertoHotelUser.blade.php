<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Reserva - Aeropuerto a Hotel</title>

</head>
<body>
    @if (Auth::check())
        @if (Auth::user()->tipo_usuario == '1')
            <!-- Header para el usuario tipo 1 -->
            @include('users.headerUser')
        @elseif (Auth::user()->tipo_usuario == '2')
            <!-- Header para el usuario tipo 2 -->
            @include('corp.headerCorp')
        @endif
    @endif

    <!-- Cargar plantilla -->
    @include('plantilla.plantillaReservaAeropuertoHotel')

    <!-- Footer -->
    @include('plantilla.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
