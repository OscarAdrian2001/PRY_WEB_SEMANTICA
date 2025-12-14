<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CitaResource extends JsonResource
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
            "@type" => "MedicalAppointment",

            "id" => $this->id,
            "startDate" => $this->fecha_hora,
            "status" => $this->estado,
            "reason" => $this->motivo,

            "patient" => new PacienteResource($this->paciente),
            "physician" => new MedicoResource($this->medico),
        ];
    }
}
