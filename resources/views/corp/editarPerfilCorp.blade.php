<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil Corporativo</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Header -->
    @include('corp.headerCorp')

    <!-- Contenedor principal -->
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <!-- Título -->
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold text-blue-700">Editar Perfil</h1>
            <p class="text-gray-600">Actualiza tu información personal aquí</p>
        </div>

        <!-- Formulario -->
        <form action="{{ route('perfil.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('POST')

            <!-- Nombre y Apellidos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        value="{{ old('nombre', Auth::user()->nombre) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required
                    />
                </div>
                <div>
                    <label for="apellido1" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                    <input 
                        type="text" 
                        name="apellido1" 
                        id="apellido1" 
                        value="{{ old('apellido1', Auth::user()->apellido1) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>
                <div>
                    <label for="apellido2" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                    <input 
                        type="text" 
                        name="apellido2" 
                        id="apellido2" 
                        value="{{ old('apellido2', Auth::user()->apellido2) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email', Auth::user()->email) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required
                />
            </div>

            <!-- Contraseña Actual -->
            {{-- <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Contraseña Actual</label>
                <input 
                    type="password" 
                    name="current_password" 
                    id="current_password"
                    placeholder="Introduce tu contraseña actual"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500"
                    required
                />
            </div> --}}

            <!-- Contraseña Actual -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Contraseña Actual</label>
                <input 
                    type="password" 
                    name="current_password" 
                    id="current_password"
                    placeholder="Introduce tu contraseña actual"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500"
                    required
                />
            </div>

            <!-- Nueva Contraseña -->
            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-700">Nueva Contraseña (Opcional)</label>
                <input 
                    type="password" 
                    name="new_password" 
                    id="new_password" 
                    placeholder="Introduce una nueva contraseña"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>
            
            <!-- Confirmación Nueva Contraseña -->
            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Nueva Contraseña</label>
                <input 
                    type="password" 
                    name="new_password_confirmation" 
                    id="new_password_confirmation" 
                    placeholder="Confirma tu nueva contraseña"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"
                />
            </div>

            <!-- Botón de Actualización -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="inline-flex items-center px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-8.586 8.586A2 2 0 017.586 17H5a1 1 0 01-1-1v-2.586a2 2 0 01.586-1.414l8.586-8.586zm1.414 1.414L11 8.414l1.586 1.586 2.707-2.707L13.707 4.707zM6 15v1h1l.293-.293L6 14.414V15z" clip-rule="evenodd"></path>
                    </svg>
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div id="alert-success" class="fixed top-4 right-4 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 shadow-md" role="alert">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L9 11.086l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ session('success') }}</span>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-success" aria-label="Close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => alert.remove(), 300); // Elimina la alerta del DOM
            }
        }, 5000); // Se oculta después de 5 segundos
    </script>

    <!-- Footer -->
    @include('plantilla.footer')
    <script>
        //TEST
        var tipoUsuario = "{{ Auth::user()->tipo_usuario }}";
        console.log(tipoUsuario); // Ver el valor en la consola
        </script>
    <!-- Flowbite Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>
</html>