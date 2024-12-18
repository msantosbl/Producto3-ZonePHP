<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <!-- Enlace a Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Enlace a Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Menú -->
    @include('plantilla.menuAdministrador')

    <div class="container mx-auto mt-10 px-4">
        <!-- Formulario para añadir usuario -->
        <div class="bg-white shadow-md rounded-lg mb-8">
            <div class="bg-blue-600 text-white text-lg font-semibold px-6 py-4 rounded-t-lg">
                Perfil Administrador
            </div>
            <div class="p-6">
                <form action="{{ route('usuarios.add') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="apellido1" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                            <input type="text" name="apellido1" id="apellido1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="apellido2" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                            <input type="text" name="apellido2" id="apellido2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="tipo_usuario" class="block text-sm font-medium text-gray-700">Tipo de Usuario</label>
                        <input type="text" name="tipo_usuario" id="tipo_usuario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Añadir Usuario</button>
                </form>
            </div>
        </div>

        <!-- Tabla de usuarios -->


        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-gray-800 text-white text-lg font-semibold px-6 py-4 rounded-t-lg">
                Listado de Usuarios
            </div>
            <div class="p-6">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Apellido</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Dirección</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Ciudad</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Tipo de Usuario</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $usuario)
                            <tr id="usuario-row-{{ $usuario->id_viajero }}">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->id_viajero }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->apellido1 }} {{ $usuario->apellido2 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->direccion }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->ciudad }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->tipo_usuario }}</td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-md"
                                    onclick="toggleEditForm({{ $usuario->id_viajero }})"
                                    >Editar</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md"
                                    onclick="deleteUsuario({{ $usuario->id_viajero }})"
                                    >Eliminar</button>
                                </td>
                            </tr>

                           <tr id="edit-form-{{ $usuario->id_viajero }}" class="edit-form hidden">
    <td colspan="8" class="p-4 bg-gray-50">
        <form action="{{ route('usuarios.update', $usuario->id_viajero) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <!-- Primer Apellido -->
                <div>
                    <label for="apellido1" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                    <input type="text" name="apellido1" value="{{ $usuario->apellido1 }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Segundo Apellido -->
                <div>
                    <label for="apellido2" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                    <input type="text" name="apellido2" value="{{ $usuario->apellido2 }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
                    <!-- Tabla para modificar los datos del usuario -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Dirección -->
                        <div>
                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" name="direccion" value="{{ $usuario->direccion }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <!-- Ciudad -->
                        <div>
                            <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <input type="text" name="ciudad" value="{{ $usuario->ciudad }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Correo Electrónico -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ $usuario->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <!-- Tipo de Usuario -->
                        <div>
                            <label for="tipo_usuario" class="block text-sm font-medium text-gray-700">Tipo de Usuario</label>
                            <input type="text" name="tipo_usuario" value="{{ $usuario->tipo_usuario }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md">
                            Guardar Cambios
                        </button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md" onclick="toggleEditForm({{ $usuario->id_viajero }})">
                            Cancelar
                        </button>
                    </div>
                </form>
            </td>
        </tr>


                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-600">No hay usuarios registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function toggleEditForm(id) {
            const form = document.getElementById(`edit-form-${id}`);
            form.classList.toggle('hidden');
        }
    
        function deleteUsuario(id_viajero) {
            // Mostrar mensaje de confirmación con Flowbite
            if (!confirm('¿Estás seguro de eliminar este usuario?')) return;
    
            fetch(`/usuarios/${id_viajero}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => {
                if (response.ok) {
                    // Eliminar el usuario visualmente
                    document.getElementById(`usuario-row-${id_viajero}`).remove();
                    showNotification('Usuario eliminado correctamente.', 'success');
                } else {
                    showNotification('Error al eliminar el usuario.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error al eliminar el usuario.', 'error');
            });
        }
    
        function showNotification(message, type) {
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                info: 'bg-blue-500',
            };
    
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 flex items-center ${colors[type]} text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md animate-slide-in`;
            notification.innerHTML = `
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}" />
                </svg>
                <span>${message}</span>
            `;
    
            document.body.appendChild(notification);
    
            // Eliminar la notificación después de 3 segundos
            setTimeout(() => {
                notification.classList.add('opacity-0');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    </script>
    
    <!-- Footer -->
    @include('plantilla.footer')
</body>
</html>
