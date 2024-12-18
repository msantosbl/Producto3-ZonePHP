<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vehiculo extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'transfer_precios';

    // Define la clave primaria
    protected $primaryKey = 'id_precios';

    // Permite el uso de campos específicos para asignación masiva
    protected $fillable = [
        'id_vehiculo',
        'id_hotel',
        'precio',
    ];
}
