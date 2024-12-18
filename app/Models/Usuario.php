<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define el nombre de la tabla
    protected $table = 'transfer_viajeros';

    // Define la clave primaria
    protected $primaryKey = 'id_viajero';

    // Permite el uso de campos específicos para asignación masiva
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'direccion',
        'codigoPostal',
        'ciudad',
        'pais',
        'email',
        'password',
        'tipo_usuario',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Deshabilita timestamps si la tabla no los usa
    public $timestamps = false;
}
