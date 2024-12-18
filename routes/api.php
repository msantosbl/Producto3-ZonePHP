<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\userController;
use App\Models\Usuario;
use App\Http\Controllers\TransferReservaController;

// Rutas de la API para el modelo Usuario
Route::get('/usuarios', [userController::class, 'index']);

// Ruta para obtener un usuario por su ID
Route::get('/transfer_viajeros/{id}', [userController::class, 'show']);

// Ruta para crear un usuario
Route::post('/transfer_viajeros', [userController::class, 'store']);

// Ruta para eliminar un usuario
Route::delete('/transfer_viajeros/{id}', [userController::class, 'deleteUser']);

// Ruta para actualizar un usuario
Route::put('/transfer_viajeros/{id}', [UserController::class, 'updateUser']);

// Ruta para crear un usuario
Route::post('/transfer_viajeros', [UserController::class, 'store'])->name('usuarios.add');


// Rutas para la API de reservas
Route::get('/reservas', [TransferReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservas/{id}', [TransferReservaController::class, 'show'])->name('reservas.show');
Route::post('/reservas', [TransferReservaController::class, 'store'])->name('reservas.store');
Route::put('/reservas/{id}', [TransferReservaController::class, 'update'])->name('reservas.update');
Route::delete('/reservas/{id}', [TransferReservaController::class, 'destroy'])->name('reservas.destroy');











