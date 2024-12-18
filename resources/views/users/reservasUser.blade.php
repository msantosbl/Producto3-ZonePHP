<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Reservas de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
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
    <!-- Botones para mostrar/ocultar secciones -->
    <div class="container mt-4">
        <div class="d-flex justify-content-center gap-3">
            <button id="btnAH" class="btn btn-primary">Ver Reservas Aeropuerto a Hotel</button>
            <button id="btnHA" class="btn btn-secondary">Ver Reservas Hotel a Aeropuerto</button>
        </div>
    </div>

    <!-- Contenido: Reservas Aeropuerto a Hotel -->
    <div id="sectionAH" class="container mt-5">
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white p-8 rounded-lg shadow-md mb-10">
            <h1 class="text-4xl font-bold mb-2">Reservas del Aeropuerto al Hotel</h1>
        </div>
        @if ($reservasUserAH->isEmpty())
            <p>No hay reservas disponibles.</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Localizador</th>
                        <th>Fecha de Entrada</th>
                        <th>Hora de Entrada</th>
                        <th>Número de Vuelo</th>
                        <th>Origen del Vuelo</th>
                        <th>Número de Viajeros</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasUserAH as $reservaAH)
                        <tr>
                            <td>{{ $reservaAH->localizador }}</td>
                            <td>{{ $reservaAH->fecha_entrada }}</td>
                            <td>{{ $reservaAH->hora_entrada }}</td>
                            <td>{{ $reservaAH->numero_vuelo_entrada }}</td>
                            <td>{{ $reservaAH->origen_vuelo_entrada }}</td>
                            <td>{{ $reservaAH->num_viajeros }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Contenido: Reservas Hotel a Aeropuerto -->
    <div id="sectionHA" class="container mt-5 hidden">
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white p-8 rounded-lg shadow-md mb-10">
            <h1 class="text-4xl font-bold mb-2">Reservas del Hotel al Aeropuerto</h1>
        </div>
        @if ($reservasUserHA->isEmpty())
            <p>No hay reservas disponibles.</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Localizador</th>
                        <th>Fecha de Entrada</th>
                        <th>Hora de Entrada</th>
                        <th>Hora del Vuelo</th>
                        <th>Número de Vuelo</th>
                        <th>Número de Viajeros</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasUserHA as $reservaHA)
                        <tr>
                            <td>{{ $reservaHA->localizador }}</td>
                            <td>{{ $reservaHA->fecha_entrada }}</td>
                            <td>{{ $reservaHA->hora_entrada }}</td>
                            <td>{{ $reservaHA->hora_vuelo_salida }}</td>
                            <td>{{ $reservaHA->numero_vuelo_entrada }}</td>
                            <td>{{ $reservaHA->num_viajeros }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Footer -->
    @include('plantilla.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para mostrar unas reservas u otras-->
    <script>
        const btnAH = document.getElementById('btnAH');
        const btnHA = document.getElementById('btnHA');
        const sectionAH = document.getElementById('sectionAH');
        const sectionHA = document.getElementById('sectionHA');

        btnAH.addEventListener('click', function () {
            sectionAH.classList.remove('hidden');
            sectionHA.classList.add('hidden');
            btnAH.classList.add('btn-primary');
            btnAH.classList.remove('btn-secondary');
            btnHA.classList.add('btn-secondary');
            btnHA.classList.remove('btn-primary');
        });

        btnHA.addEventListener('click', function () {
            sectionHA.classList.remove('hidden');
            sectionAH.classList.add('hidden');
            btnHA.classList.add('btn-primary');
            btnHA.classList.remove('btn-secondary');
            btnAH.classList.add('btn-secondary');
            btnAH.classList.remove('btn-primary');
        });
    </script>
</body>
</html>
