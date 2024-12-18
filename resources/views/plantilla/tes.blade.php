<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--  menu -->
    @include('plantilla.menuAdministrador')
    <div class="container mt-5">
        <!-- Formulario para añadir usuario -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2>Perfil administrador</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.add') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido1" class="form-label">Primer Apellido</label>
                            <input type="text" name="apellido1" id="apellido1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="apellido2" class="form-label">Segundo Apellido</label>
                            <input type="text" name="apellido2" id="apellido2" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                            <input type="text" name="tipo_usuario" id="tipo_usuario" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir Usuario</button>
                </form>
            </div>
        </div>


        <!-- Tabla de usuarios -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h2>Listado de Usuarios</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Email</th>
                            <th>Tipo de Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usuarios-tbody">
                        @forelse ($usuarios as $usuario)
                            <tr id="usuario-row-{{ $usuario->id_viajero }}">
                                <td>{{ $usuario->id_viajero }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido1 }} {{ $usuario->apellido2 }}</td>
                                <td>{{ $usuario->direccion }}</td>
                                <td>{{ $usuario->ciudad }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->tipo_usuario }}</td>
                                <td>
                                    <!-- Botón para mostrar formulario de edición -->
                                    <button class="btn btn-warning btn-sm" onclick="toggleEditForm({{ $usuario->id_viajero }})">Editar</button>

                                    <!-- Botón para eliminar con AJAX -->
                                    <button class="btn btn-danger btn-sm" onclick="deleteUsuario({{ $usuario->id_viajero }})">Eliminar</button>
                                </td>
                            </tr>
                            <tr id="edit-form-{{ $usuario->id_viajero }}" class="edit-form" style="display: none;">
                                <td colspan="8">
                                    <form action="{{ route('usuarios.update', $usuario->id_viajero) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="apellido1" class="form-label">Primer Apellido</label>
                                                <input type="text" name="apellido1" value="{{ $usuario->apellido1 }}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="apellido2" class="form-label">Segundo Apellido</label>
                                                <input type="text" name="apellido2" value="{{ $usuario->apellido2 }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="direccion" class="form-label">Dirección</label>
                                                <input type="text" name="direccion" value="{{ $usuario->direccion }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ciudad" class="form-label">Ciudad</label>
                                                <input type="text" name="ciudad" value="{{ $usuario->ciudad }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Correo Electrónico</label>
                                                <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                                                <input type="text" name="tipo_usuario" value="{{ $usuario->tipo_usuario }}" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                        <button type="button" class="btn btn-secondary" onclick="toggleEditForm({{ $usuario->id_viajero }})">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No hay usuarios registrados</td>
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
            form.style.display = form.style.display === 'none' ? 'table-row' : 'none';
        }

        function deleteUsuario(id) {
            if (!confirm('¿Estás seguro de eliminar este usuario?')) return;

            fetch(`/usuarios/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(`usuario-row-${id}`).remove();
                    alert('Usuario eliminado correctamente.');
                } else {
                    alert('Error al eliminar el usuario.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar el usuario.');
            });
        }
    </script>
    <!-- Footer -->
    @include('plantilla.footer')
    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
