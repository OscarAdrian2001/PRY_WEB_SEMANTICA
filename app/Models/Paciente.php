<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'fecha_nacimiento',
        'sexo',
        'historial_medico'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
