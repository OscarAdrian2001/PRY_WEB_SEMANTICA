<?php

namespace Database\Seeders;


use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Especialidad::create([
            'nombre' => 'Cardiología',
            'descripcion' => 'Especialidad del corazón'
        ]);

        Especialidad::create([
            'nombre' => 'Pediatría',
            'descripcion' => 'Atención médica infantil'
        ]);

        Especialidad::create([
            'nombre' => 'Dermatología',
            'descripcion' => 'Enfermedades de la piel'
        ]);
    }
}
