<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="width: 400px;">
            <h3 class="text-center mb-4">Iniciar Sesión</h3>
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="********"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
                <div class="text-center mt-3">
                <a href="{{ route('register.view') }}">No tienes una cuenta? Registrate</a>
            </div>
            </form>
            <!-- <div class="text-center mt-3">
    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
</div> -->

        </div>
    </div>
</body>

</html>
<!-- Footer -->
@include('plantilla.footer')