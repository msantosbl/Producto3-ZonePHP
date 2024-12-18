<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TransferViajero;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Valida las credenciales
        $credentials = $request->only('email', 'password');
    
        // Intenta autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Llama a checktipo_usuario para manejar la redirección según el tipo de usuario
            return $this->checktipo_usuario();
        } else {
            // Si las credenciales son incorrectas
            return back()->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'apellido2' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'codigoPostal' => 'required|string|max:100',
            'ciudad' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
            'email' => 'required|email|unique:transfer_viajeros,email',
            'password' => 'required|string',

        ]);

        // Crear el nuevo usuario
        $user = new TransferViajero;
        $user->nombre = $request->nombre;
        $user->apellido1 = $request->apellido1;
        $user->apellido2 = $request->apellido2;
        $user->direccion = $request->direccion;
        $user->codigoPostal = $request->codigoPostal;
        $user->ciudad = $request->ciudad;
        $user->pais = $request->pais;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // Autenticar al usuario después de registrarse
        Auth::login($user);
    }

    //TMP
    public function registerAdmin(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'apellido2' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'codigoPostal' => 'required|string|max:100',
            'ciudad' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
            'email' => 'required|email|unique:transfer_viajeros,email',
            'password' => 'required|string',
            'tipo_usuario' => 'required|string',
        ]);

        // Crear el nuevo usuario
        $user = new TransferViajero;
        $user->nombre = $request->nombre;
        $user->apellido1 = $request->apellido1;
        $user->apellido2 = $request->apellido2;
        $user->direccion = $request->direccion;
        $user->codigoPostal = $request->codigoPostal;
        $user->ciudad = $request->ciudad;
        $user->pais = $request->pais;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // Autenticar al usuario después de registrarse
        Auth::login($user);
    }

    public function checktipo_usuario()
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene el tipo de usuario
            $tipoUsuario = Auth::user()->tipo_usuario;

            // Redirige según el tipo de usuario
            if ($tipoUsuario == '0') {
                return redirect()->route('welcome');
            } elseif ($tipoUsuario == '1') {
                return redirect()->route('perfilUser');
            } elseif ($tipoUsuario == '2') {
                return redirect()->route('perfilCorp'); // Asegúrate de crear esta ruta
            }

            // Si el tipo de usuario no es válido, cierra la sesión
            Auth::logout();
            return back()->withErrors(['login' => 'Tipo de usuario no válido']);
        }

        // Si no está autenticado, redirige al login
        return redirect()->route('login.view');
    }
}
