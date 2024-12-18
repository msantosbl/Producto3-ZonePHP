<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\TransferReserva;
use Illuminate\Http\Request;
use App\Http\Controllers\TransferReservaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Obtener usuarios y reservas
        $users = Usuario::all();
        dump($users->toArray());  // Esto imprimirá el contenido de $users sin detener la ejecución
        $reservas = TransferReserva::select('localizador', 'id_reserva', 'email_cliente', 'fecha_reserva')->get();

        // Pasar los datos a la vista welcome
        return view('plantilla.perfilAdministrador', compact('users', 'reservas'));
    }

public function edit()
{
    $user = Auth::user();
    return view('users.editarPerfil', compact('user'));
}

// Actualizar el perfil del usuario autenticado
public function update(Request $request)
{
    // Validar solo los campos necesarios
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|max:100|unique:transfer_viajeros,email,' . Auth::user()->id_viajero . ',id_viajero',
        'apellido1' => 'nullable|string|max:100',
        'apellido2' => 'nullable|string|max:100',
        'current_password' => 'required|string',  
        'new_password' => 'nullable|string|confirmed',  
    ]);

    $user = Auth::user();

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        // Actualizar los datos del usuario
        $user->nombre = $validated['nombre'];
        $user->email = $validated['email'];
        $user->apellido1 = $validated['apellido1'];
        $user->apellido2 = $validated['apellido2'];

        // Actualizar la contraseña si se proporciona una nueva
        if ($request->filled('new_password')) {
            $user->password = Hash::make($validated['new_password']);
        }

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('perfil.edit')->with('success', '¡Se han actualizado los datos correctamente!');
}

public function delete(Request $request, $id_viajero) {
    $user = Usuario::findOrFail($id_viajero);

    if($user){
        $user->delete();
        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ], 200);
    } else {
        return response()->json([
            'message' => 'Usuario no encontrado'
        ], 404);
    }
}
}


