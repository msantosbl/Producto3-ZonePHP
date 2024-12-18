    <div class="container mx-auto mt-10">
        <!-- Título -->
        <h1 class="text-center  mb-5 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Hotel</span> Aeropuerto.</h1>


        </div>
        @if ($errors->any())
        <div class="mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

        <!-- Formulario -->
        <form action="{{ route('reservas.hotelToAirport.store') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 py-6 max-w-lg mx-auto">
            @csrf

            <!-- Campo para día de vuelo -->
            <div class="mb-4">
                <label for="fecha_entrada" class="block text-sm font-medium text-gray-700 mb-2">Día de vuelo:</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para hora de vuelo -->
            <div class="mb-4">
                <label for="hora_entrada" class="block text-sm font-medium text-gray-700 mb-2">Hora de vuelo:</label>
                <input type="time" id="hora_entrada" name="hora_entrada" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para número de vuelo -->
            <div class="mb-4">
                <label for="numero_vuelo_entrada" class="block text-sm font-medium text-gray-700 mb-2">Número de vuelo:</label>
                <input type="text" id="numero_vuelo_entrada" name="numero_vuelo_entrada" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para hora de recogida -->
            <div class="mb-4">
                <label for="hora_vuelo_salida" class="block text-sm font-medium text-gray-700 mb-2">Hora de recogida:</label>
                <input type="time" id="hora_vuelo_salida" name="hora_vuelo_salida" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para email cliente -->
            <div class="mb-4">
                <label for="email_cliente" class="block text-sm font-medium text-gray-700 mb-2">Email cliente:</label>
                <input type="email" id="email_cliente" name="email_cliente" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para número de viajeros -->
            <div class="mb-4">
                <label for="num_viajeros" class="block text-sm font-medium text-gray-700 mb-2">Número de viajeros:</label>
                <input type="number" id="num_viajeros" name="num_viajeros" class="form-input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Botón de envío -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Guardar Cambios
                </button>
            </div>

            <!-- Campo oculto para ida o vuelta -->
            <input type="hidden" id="ida_vuelta" name="ida_vuelta" value="false">

             <!-- Botón de Guardar y Continuar -->
            <div class="mt-6">
                <button type="button" id="guardarContinuar" class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Guardar y Continuar
                </button>
            </div>
        </form>
    </div>

<script>
    // Al hacer clic en "Guardar y Continuar", cambiar el valor del campo oculto
    document.getElementById('guardarContinuar').addEventListener('click', function() {
    document.getElementById('ida_vuelta').value = 'true'; // Cambiar el valor del campo oculto
    document.querySelector('form').submit(); // Enviar el formulario
    });
</script>