<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Person",

            "id" => $this->id,
            "name" => $this->nombre,
            "email" => $this->email,
            "telephone" => $this->telefono,
            "birthDate" => $this->fecha_nacimiento,
            "gender" => $this->sexo,
            "medicalHistory" => $this->historial_medico,
        ];
    }
}
