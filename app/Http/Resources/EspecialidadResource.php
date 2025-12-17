<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EspecialidadResource extends JsonResource
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
            "@type" => "MedicalSpecialty",

            '@id' => url('/api/especialidades/' . $this->id),
            "name" => $this->nombre,
            "description" => $this->descripcion
        ];
    }
}
