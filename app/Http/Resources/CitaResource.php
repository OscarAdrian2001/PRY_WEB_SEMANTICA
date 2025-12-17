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
            '@context' => 'https://schema.org',
            '@type' => 'MedicalAppointment',
            '@id' => url('/api/citas/' . $this->id),

            'startDate' => $this->fecha_hora,
            'status' => $this->estado,

            'patient' => [
                '@type' => 'Patient',
                'name' => $this->paciente->nombre
            ],

            'physician' => [
                '@type' => 'Physician',
                'name' => $this->medico->nombre
            ]
        ];

    }
}
