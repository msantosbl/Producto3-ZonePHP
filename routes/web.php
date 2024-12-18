<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\userController as UserApi;
use App\Http\Controllers\TransferReservaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Middleware\AdminMiddleware;
use App\Http\Controllers\Middleware\AuthMiddleware;


// Ruta raíz: redirige al login
Route::get('/', function () {
    return redirect()->route('login.view');
});

// Rutas públicas de autenticación
Route::get('/login', function () {
    return view('login');
})->name('login.view');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta de recuperación de contraseña
Route::get('/password/request', function () {
    return "Página de recuperación de contraseña en construcción.";
})->name('password.request');

// Rutas protegidas por autenticación
Route::middleware(['is_user'])->group(function () {

    // Perfiles
    Route::view('/perfilUser', 'perfilUser')->name('perfilUser');


    //Reservas del Usuario
    Route::get('/reservasUser', [TransferReservaController::class, 'showAllReservationsUser'])->name('reservas.reservasUser');
    //reserva ida y vuelta Usuario
    Route::get('/reservaIdaVuelta', function () {return view('reservaIdaVuelta', ['show' => 'reservaIdaVuelta']);})->name('reservaIdaVuelta');

    // Formularios de reserva
    Route::view('/aeropuertoHotelUser', 'users.aeropuertoHotelUser')->name('aeropuertoHotelUser');
    Route::view('/hotelAeropuertoUser', 'users.hotelAeropuertoUser')->name('hotelAeropuertoUser');
    Route::view('/reserva-ambas', 'users.ambasUser')->name('reserva-ambas');

    // Rutas específicas para reservas
    Route::view('/reservas/hotelToAirport', 'plantilla.reservarHotelToAeropuerto')->name('reservas.hotelToAirport');
    Route::post('/reservas/hotelToAirport/store', [TransferReservaController::class, 'storeHotelToAirport'])->name('reservas.hotelToAirport.store');
    Route::view('/reservas/aeropuertoHotel', 'plantilla.reservarAeropuertoHotel')->name('reservas.aeropuertoHotel');
    Route::post('/reservas/aeropuertoHotel/store', [TransferReservaController::class, 'storeAirportToHotel'])->name('reservas.aeropuertoHotel.store');

    // Editar perfil
    Route::view('/editarPerfil', 'users.editarPerfil')->name('editarPerfil');
    Route::get('/perfil/editarPerfil', [UserController::class, 'edit'])->name('perfil.edit');
    Route::post('/perfil/editarPerfil', [UserController::class, 'update'])->name('perfil.update');
});

//Rutas admin protegidas
Route::middleware(['is_admin'])->group(function () {

    // Página de bienvenida Admin
    Route::view('/welcome', 'welcome')->name('welcome');

    // Perfil de administrador
    Route::get('/perfilAdministrador', [UserController::class, 'index'])->name('usuarios.index');
    Route::put('/usuarios/{id}', [UserApi::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'delete'])->name('usuarios.delete');

    // Reservas
    Route::view('/reservas', 'plantilla.reservas')->name('reservas.view');
    Route::get('/reservas/filtrar', [TransferReservaController::class, 'filtrar'])->name('reservas.filtrar');
});

//Rutas Corp protegidas
Route::middleware(['is_corp'])->group(function () {
    Route::view('/perfilCorp', 'perfilCorp')->name('perfilCorp');
    Route::get('/corp/editarPerfilCorp', [UserController::class, 'editCorp'])->name('editarPerfilCorp');
    Route::view('/editarPerfilCorp', 'corp.editarPerfilCorp')->name('editarPerfil');
    Route::view('/comisionesCorp', 'corp.comisionesCorp')->name('comisionesCorp');
    
    
});