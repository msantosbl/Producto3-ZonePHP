<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //listar
    public function index()

    {
    // Obtiene todos los usuarios de la base de datos
    $usuarios = Usuario::all();

    // Retorna la vista con los usuarios
    return view('plantilla.perfilAdministrador', compact('usuarios'));
    }

    // Método para añaadir un nuevo usuario desde el frontal.
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido1' => 'nullable|string|max:100',
            'apellido2' => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:100',
            'ciudad' => 'nullable|string|max:100',
            'email' => 'required|email|unique:transfer_viajeros,email|max:100',
            'password' => 'required|string|max:255',
            'tipo_usuario' => 'nullable|string|max:100',
        ]);
    
        // Cifrar la contraseña
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Crear el usuario
        Usuario::create($validatedData);
    
        // Redirigir de vuelta a la página de listado con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }
    
    //buscar
        public function show($id)
    {
        $user = Usuario::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        return response()->json($user, 200);
    }

    //eliminar    // Método para eliminar usuario por ID
    public function deleteUser($id)
    {
        // Busca el usuario por ID
        $user = Usuario::find($id);

        // Verifica si el usuario existe
        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        // Elimina el usuario
        $user->delete();

        // Retorna la respuesta de éxito
        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ], 200);
    }

    
    //desde el frontal.
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return redirect()->route('usuarios')->with('error', 'Usuario no encontrado.');
        }
        
        return view('plantilla.editUsuario', compact('usuario'));
    }
    

public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido1' => 'nullable|string|max:100',
        'apellido2' => 'nullable|string|max:100',
        'direccion' => 'nullable|string|max:100',
        'ciudad' => 'nullable|string|max:100',
        'email' => 'required|email|max:100|unique:transfer_viajeros,email,' . $id . ',id_viajero',
        'tipo_usuario' => 'nullable|string|max:100',
    ]);

    // Buscar al usuario
    $usuario = Usuario::find($id);

    if (!$usuario) {
        return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado.');
    }

    // Actualizar los datos del usuario
    $usuario->update($validatedData);

    // Redirigir con un mensaje de éxito
    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
}

    
    

}