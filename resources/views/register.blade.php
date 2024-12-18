<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-sm" style="width: 400px;">
            <h3 class="text-center mb-4">Registro de Usuario</h3>
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" name="apellido1" id="apellido1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" name="apellido2" id="apellido2" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="codigoPostal" class="form-label">Código Postal</label>
                    <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" name="pais" id="pais" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('login.view') }}">¿Ya tienes una cuenta? Iniciar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
