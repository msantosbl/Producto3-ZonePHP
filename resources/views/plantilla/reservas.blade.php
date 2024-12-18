<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Reservas</title>
    <!-- Enlace a Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com" defer></script>
    <!-- Enlace a Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <!-- Menú de administrador -->
    @include('plantilla.menuAdministrador')

    <div class="container mx-auto mt-10 px-4 md:px-10">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Consultar Reservas</h1>
            <p class="text-gray-600">Filtra y consulta reservas según el día, la semana o el mes.</p>
        </div>

         <!-- Consultar reservas por día -->
         <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-4 mb-4">Consultar Reservas por Día</h2>
            <form action="{{ route('reservas.filtrar') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="day" class="block text-sm font-medium text-gray-700">Seleccione el día:</label>
                    <input type="date" id="day" name="filter_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300" required>
                </div>
                <input type="hidden" name="filter_type" value="day">
                <div class="flex items-end">
                    <button type="submit" aria-label="Consultar por día" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Consultar</button>
                    
                </form>
            </div>
            @if (isset($reservasDia) && count($reservasDia) > 0)
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-blue-700 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Día</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Total Reservas</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Reserva</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Email Cliente</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Destino</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Fecha Reserva</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($reservasDia as $reserva)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->fecha_reserva }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->total_reservas }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_reserva }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->email_cliente }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_destino }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->fecha_reserva }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 text-center mt-6">No se encontraron reservas para este día.</p>
        @endif
    </div>
        

          <!-- Consultar reservas por semana -->
          <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-4 mb-4">Consultar Reservas por Semana</h2>
            <form action="{{ route('reservas.filtrar') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="semana" class="block text-sm font-medium text-gray-700">Seleccione la semana:</label>
                    <input type="week" id="semana" name="filter_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300" required>
                </div>
                <input type="hidden" name="filter_type" value="week">
                <div class="flex items-end">
                    <button type="submit" aria-label="Consultar por semana" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">Consultar</button>
                
            </form>
        </div>
        @if (isset($reservasSemana) && count($reservasSemana) > 0)
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Semana</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Total Reservas</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Reserva</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Email Cliente</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Destino</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Fecha Reserva</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reservasSemana as $reserva)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->semana }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->total_reservas }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_reserva }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->email_cliente }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_destino }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->fecha_reserva }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600 text-center mt-6">No se encontraron reservas para esta semana.</p>
    @endif
    </div>

        <!-- Consultar reservas por mes -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-4 mb-4">Consultar Reservas por Mes</h2>
            <form action="{{ route('reservas.filtrar') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Seleccione el mes:</label>
                    <input type="month" id="month" name="filter_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-300" required>
                </div>
                <input type="hidden" name="filter_type" value="month">
                <div class="flex items-end">
                    <button type="submit" aria-label="Consultar por mes" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded-lg">Consultar</button>

            </form>
        </div>
        @if (isset($reservasMes) && count($reservasMes) > 0)
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Localizador</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Reserva</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Email Cliente</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">ID Destino</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Fecha Reserva</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reservasMes as $reserva)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->localizador }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_reserva }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->email_cliente }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->id_destino }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reserva->fecha_entrada }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600 mt-6">No se encontraron reservas para este mes.</p>
    @endif
    
    </div>
</div>


    <!-- Footer -->
    @include('plantilla.footer')
    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
