<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Patient',
            '@id' => url('/api/pacientes/' . $this->id),

            'name' => $this->nombre,
            'email' => $this->email,
            'telephone' => $this->telefono,
            'birthDate' => $this->fecha_nacimiento,
            'gender' => $this->sexo,
            'medicalCondition' => $this->historial_medico,
        ];
    }
}
