<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
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
            '@type' => 'Physician',
            '@id' => url('/api/medicos/' . $this->id),

            'name' => $this->nombre,
            'email' => $this->email,
            'telephone' => $this->telefono,

            'medicalSpecialty' => [
                '@type' => 'MedicalSpecialty',
                'name' => $this->especialidad->nombre,
                'description' => $this->especialidad->descripcion,
            ]
        ];
        
    }
}
