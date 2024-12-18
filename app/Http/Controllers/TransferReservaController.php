<?php

namespace App\Http\Controllers;

use App\Models\TransferReserva;
use App\Models\TransferHotel;
use App\Models\TransferPrecios;
use App\Models\TransferVehiculo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class TransferReservaController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // Tipo de filtro (day, week, month)
        $date = $request->query('date');     // Fecha base para el filtro
    
        if (!$filter || !$date) {
            return response()->json(['error' => 'Faltan parámetros para el filtro'], 400);
        }
    
        $query = TransferReserva::query();
    
        switch ($filter) {
            case 'day':
                $query->whereDate('fecha_reserva', $date);
                break;
    
            case 'week':
                $startOfWeek = Carbon::parse($date)->startOfWeek();
                $endOfWeek = Carbon::parse($date)->endOfWeek();
                $query->whereBetween('fecha_reserva', [$startOfWeek, $endOfWeek]);
                break;
    
            case 'month':
                $startOfMonth = Carbon::parse($date)->startOfMonth();
                $endOfMonth = Carbon::parse($date)->endOfMonth();
                $query->whereBetween('fecha_reserva', [$startOfMonth, $endOfMonth]);
                break;
    
            default:
                return response()->json(['error' => 'Filtro no válido'], 400);
        }
    
        $reservas = $query->get();
        return response()->json($reservas);
    }
    
    

    public function show($id)
    {
        return TransferReserva::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'localizador' => 'required|string|max:100',
            'id_hotel' => 'required|integer',
            'email_cliente' => 'required|email|max:50',
            'fecha_reserva' => 'required|date',
            // Agrega más validaciones según sea necesario
        ]);

        return TransferReserva::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $reserva = TransferReserva::findOrFail($id);

        $validatedData = $request->validate([
            'localizador' => 'sometimes|string|max:100',
            'id_hotel' => 'sometimes|integer',
            'email_cliente' => 'sometimes|email|max:50',
            'fecha_reserva' => 'sometimes|date',
            // Agrega más validaciones según sea necesariop
        ]);

        $reserva->update($validatedData);

        return $reserva;
    }

    public function destroy($id)
    {
        $reserva = TransferReserva::findOrFail($id);
        $reserva->delete();

        return response()->json(['message' => 'Reserva eliminada correctamente.']);
    }

// realizar una busqueda por dia.
   public function filtrar(Request $request)
{
    $filterType = $request->query('filter_type');
    $filterDate = $request->query('filter_date');

    if (!$filterType || !$filterDate) {
        return back()->withErrors(['error' => 'Debe seleccionar un tipo de filtro y una fecha']);
    }

    $query = TransferReserva::query();

    switch ($filterType) {
        case 'day':
            $reservasDia = $query->whereDate('fecha_reserva', $filterDate)->get();
            if ($reservasDia->isEmpty()) {
                return back()->with('info', 'No se encontraron reservas.');
            }
            return view('plantilla.reservas', compact('reservasDia'));

        case 'week':
            $startOfWeek = Carbon::parse($filterDate)->startOfWeek();
            $endOfWeek = Carbon::parse($filterDate)->endOfWeek();
            $reservasSemana = $query->whereBetween('fecha_reserva', [$startOfWeek, $endOfWeek])->get();
            if ($reservasSemana->isEmpty()) {
                return back()->with('info', 'No se encontraron reservas para esta semana.');
            }
            return view('plantilla.reservas', compact('reservasSemana'));

        case 'month':
            $startOfMonth = Carbon::parse($filterDate)->startOfMonth();
            $endOfMonth = Carbon::parse($filterDate)->endOfMonth();
            $reservasMes = $query->whereBetween('fecha_reserva', [$startOfMonth, $endOfMonth])->get();
            if ($reservasMes->isEmpty()) {
                return back()->with('info', 'No se encontraron reservas.');
            }
            return view('plantilla.reservas', compact('reservasMes'));

        default:
            return back()->withErrors(['error' => 'Filtro no válido']);
    }
}


public function storeHotelToAirport(Request $request)
{
    // Validación de los datos recibidos
    $validated = $request->validate([
        'fecha_entrada' => 'required|date',
        'hora_entrada' => 'required|string',
        'numero_vuelo_entrada' => 'required|string',
        'hora_vuelo_salida' => 'required|string',
        'email_cliente' => 'required|email',
        'num_viajeros' => 'required|integer|min:1',
    ]);

    // Obtener el usuario autenticado
    $user = auth()->user();
    
    $fechaEntrada = Carbon::parse($validated['fecha_entrada']);
    if ($fechaEntrada->isBefore(Carbon::today())) {
        return redirect()->back()->withErrors(['error' => 'No puedes hacer una reserva para un día anterior al actual.']);
    }
    // Verificar el tipo de usuario
    if ($user->tipo_usuario == 1) {
        $fechaReserva = Carbon::parse($validated['fecha_entrada']);
        $fechaLimite = Carbon::now()->addDays(2); // Fecha con 2 días de antelación

        if ($fechaReserva->lt($fechaLimite)) {
            return back()->withErrors(['error' => 'Los usuarios tipo "usuario" deben hacer reservas con al menos 2 días de antelación.']);
        }
    }

    // Guardar la nueva reserva en la base de datos
    $reserva = new TransferReserva();
    $reserva->fecha_entrada = $validated['fecha_entrada'];
    $reserva->hora_entrada = $validated['hora_entrada'];
    $reserva->numero_vuelo_entrada = $validated['numero_vuelo_entrada'];
    $reserva->hora_vuelo_salida = $validated['hora_vuelo_salida'];
    $reserva->email_cliente = $validated['email_cliente'];
    $reserva->num_viajeros = $validated['num_viajeros'];
    //Guardamos el id del viajero en la reserva
    $reserva->id_viajero_fk = $user->id_viajero;
    
    //Localizador
    $reserva->localizador = strtoupper(uniqid());

    // Agregar el id_tipo_reserva con el valor 1 (Hotel a Aeropuerto)
    $reserva->id_tipo_reserva = 1;

    // Guardar la fecha actual del sistema en fecha_reserva
    $reserva->fecha_reserva = now();
    $reserva->save();

    // Verificar si es un flujo "ida y vuelta"
    if ($request->input('ida_vuelta') === 'true') {
        return redirect()->route('reservas.aeropuertoHotel')->with('success', 'Reserva de ida creada con éxito. Ahora completa la reserva de vuelta.');
    }

    return $this->redireccion_tipoUser($user);
}

public function storeAirportToHotel(Request $request)
{
    $validated = $request->validate([
        'fecha_entrada' => 'required|date',
        'hora_entrada' => 'required',
        'numero_vuelo_entrada' => 'required|string',
        'origen_vuelo_entrada' => 'required|string',
        'email_cliente' => 'required|email',
        'num_viajeros' => 'required|integer|min:1',
    ]);

    // Obtener el usuario autenticado
    $user = auth()->user();

    $fechaEntrada = Carbon::parse($validated['fecha_entrada']);
    if ($fechaEntrada->isBefore(Carbon::today())) {
        return redirect()->back()->withErrors(['error' => 'No puedes hacer una reserva para un día anterior al actual.']);
    }
    
    // Verificar el tipo de usuario
    if ($user->tipo_usuario == 1) {
        $fechaReserva = Carbon::parse($validated['fecha_entrada']);
        $fechaLimite = Carbon::now()->addDays(2); // Fecha con 2 días de antelación

        if ($fechaReserva->lt($fechaLimite)) {
            return back()->withErrors(['error' => 'Los usuarios deben hacer reservas con al menos 2 días de antelación.']);
        }
    }

    // Crear un nuevo objeto de reserva
    $reserva = new TransferReserva();
    $reserva->fecha_entrada = $validated['fecha_entrada'];
    $reserva->hora_entrada = $validated['hora_entrada'];
    $reserva->numero_vuelo_entrada = $validated['numero_vuelo_entrada'];
    $reserva->origen_vuelo_entrada = $validated['origen_vuelo_entrada'];
    $reserva->email_cliente = $validated['email_cliente'];
    $reserva->num_viajeros = $validated['num_viajeros'];
    
    // Guardamos el id del viajero en la reserva
    $reserva->id_viajero_fk = $user->id_viajero;
    
    // Generar un localizador
    $reserva->localizador = strtoupper(uniqid());

    // Agregar el id_tipo_reserva con el valor 2 (Aeropuerto a Hotel)
    $reserva->id_tipo_reserva = 2;

    // Guardar la fecha actual del sistema en fecha_reserva
    $reserva->fecha_reserva = now();
    
    // Guardar la reserva en la base de datos
    $reserva->save();

    // Verificar si es un flujo "ida y vuelta"
    if ($request->input('ida_vuelta') === 'true') {
        return redirect()->route('reservas.hotelToAirport')->with('success', 'Reserva de ida creada con éxito. Ahora completa la reserva de vuelta.');
    }

    return $this->redireccion_tipoUser($user);
}

public function redireccion_tipoUser($user)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Debe iniciar sesión para continuar.');
    }

    $tipoUsuario = $user->tipo_usuario;

    switch ($tipoUsuario) {
        case '0':
            return redirect()->route('reservas.view')->with('success', 'Reserva realizada correctamente.');
        case '1':
            return redirect()->route('reservas.reservasUser')->with('success', 'Reserva realizada correctamente.');
        case '2':
            return redirect()->route('reservas.reservasUser'); // Crear esta vista
        default:
            return redirect()->route('login')->with('error', 'Tipo de usuario no válido.');
    }
}

public function showAllReservationsUser()
{
    // Obtén el correo electrónico del usuario autenticado
    $id_viajero = Auth::user()->id_viajero;

    // Consultar reservas del Aeropuerto al Hotel
    $reservasUserAH = TransferReserva::where('id_viajero_fk', $id_viajero)
        ->where('id_tipo_reserva', '2') 
        ->get();

    // Consultar reservas del Hotel al Aeropuerto
    $reservasUserHA = TransferReserva::where('id_viajero_fk', $id_viajero)
        ->where('id_tipo_reserva', '1') 
        ->get();

    // Retornar la vista con las reservas del usuario
    return view('users.reservasUser', compact('reservasUserAH', 'reservasUserHA'));
}

public function showAllReservationsCorp()
{
    // Obtén el correo electrónico del usuario autenticado
    $id_viajero = Auth::user()->id_viajero;

    // Consultar reservas del Aeropuerto al Hotel
    $reservasUserAH = TransferReserva::where('id_viajero_fk', $id_viajero)
        ->where('id_tipo_reserva', '2') 
        ->get();

    // Consultar reservas del Hotel al Aeropuerto
    $reservasUserHA = TransferReserva::where('id_viajero_fk', $id_viajero)
        ->where('id_tipo_reserva', '1') 
        ->get();

    // Retornar la vista con las reservas del usuario
    return view('users.reservasUser', compact('reservasUserAH', 'reservasUserHA'));
}

public function comision($reserva) {
    $id_viajero = Auth::user()->id_viajero;
    

    //buscar id_hotel y id_vehiculo de la reserva
}

}
