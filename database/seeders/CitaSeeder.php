<?php

namespace Database\Seeders;


use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        foreach ($pacientes as $paciente) {
            Cita::create([
                'fecha_hora' => fake()->dateTimeBetween('now', '+1 month'),
                'estado' => 'confirmada',
                'motivo' => fake()->sentence(),
                'paciente_id' => $paciente->id,
                'medico_id' => $medicos->random()->id
           
            ]);
        }   
    }
}
