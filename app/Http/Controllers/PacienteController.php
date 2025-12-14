<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Resources\PacienteResource;

class PacienteController extends Controller
{
    /**
     * Listar todos los pacientes
     */
    public function index()
    {
        return PacienteResource::collection(Paciente::all());
    }

    /**
     * Guardar un nuevo paciente
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string',
            'historial_medico' => 'nullable|string',
        ]);

        $paciente = Paciente::create($request->all());

        return new PacienteResource($paciente);
    }

    /**
     * Mostrar un paciente específico
     */
    public function show(Paciente $paciente)
    {
        return new PacienteResource($paciente);
    }

    /**
     * Actualizar un paciente
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->update($request->all());

        return new PacienteResource($paciente);
    }

    /**
     * Eliminar un paciente
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return response()->json([
            'message' => 'Paciente eliminado correctamente'
        ]);
    }
}

