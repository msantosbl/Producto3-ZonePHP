<div class="container mx-auto mt-10 px-4">
    <h1 class="text-center mb-5 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Aeropuerto</span> Hotel.
    </h1>

    <!-- Mostrar errores -->
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

    <div class="flex justify-center items-center">
        <form action="{{ route('reservas.aeropuertoHotel.store') }}" method="POST" class="w-full max-w-lg bg-white shadow-md rounded-lg p-6 space-y-6">
            @csrf

            <!-- Campo para día de llegada -->
            <div>
                <label for="fecha_entrada" class="block text-sm font-medium text-gray-700">Día de llegada:</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para hora de llegada -->
            <div>
                <label for="hora_entrada" class="block text-sm font-medium text-gray-700">Hora de llegada:</label>
                <input type="time" id="hora_entrada" name="hora_entrada" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para número de vuelo -->
            <div>
                <label for="numero_vuelo_entrada" class="block text-sm font-medium text-gray-700">Número de vuelo:</label>
                <input type="text" id="numero_vuelo_entrada" name="numero_vuelo_entrada" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Campo para aeropuerto de origen -->
            <div>
                <label for="origen_vuelo_entrada" class="block text-sm font-medium text-gray-700">Aeropuerto de origen:</label>
                <input type="text" id="origen_vuelo_entrada" name="origen_vuelo_entrada" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Mail Cliente -->
            <div>
                <label for="email_cliente" class="block text-sm font-medium text-gray-700">Email cliente:</label>
                <input 
                    type="email" 
                    id="email_cliente" 
                    name="email_cliente" 
                    value="{{ old('email_cliente', $userEmail ?? '') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required
                >
            </div>

            <!-- Número de Viajeros -->
            <div>
                <label for="num_viajeros" class="block text-sm font-medium text-gray-700">Número de viajeros:</label>
                <input type="number" id="num_viajeros" name="num_viajeros" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-md">
                Guardar Cambios
            </button>

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
</div>

<script>
    // Al hacer clic en "Guardar y Continuar", cambiar el valor del campo oculto
    document.getElementById('guardarContinuar').addEventListener('click', function() {
    document.getElementById('ida_vuelta').value = 'true'; // Cambiar el valor del campo oculto
    document.querySelector('form').submit(); // Enviar el formulario
    });
</script>