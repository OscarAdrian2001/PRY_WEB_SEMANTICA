<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = Especialidad::all();

        foreach ($especialidades as $especialidad) {
            Medico::create([
                'nombre' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'telefono' => fake()->phoneNumber(),
                'especialidad_id' => $especialidad->id
            ]);
        }
    }
}
