<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hotel extends Model
{
    use HasFactory;

    // Define el nombre de la tabla
    protected $table = 'transfer_hotel';

    // Define la clave primaria
    protected $primaryKey = 'id_hotel';

    // Permite el uso de campos específicos para asignación masiva
    protected $fillable = [
        'nombre',
        'comision',
        'id_viajero',
    ];
}
