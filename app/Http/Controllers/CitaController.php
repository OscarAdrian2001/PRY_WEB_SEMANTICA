<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Resources\CitaResource;

class CitaController extends Controller
{
    /**
     * Listar todas las citas
     */
    public function index()
    {
        return CitaResource::collection(Cita::with(['paciente', 'medico'])->get());
    }

    /**
     * Guardar una nueva cita
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'estado' => 'required|string',
            'motivo' => 'nullable|string',
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
        ]);

        $cita = Cita::create($request->all());

        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    /**
     * Mostrar una cita específica
     */
    public function show(Cita $cita)
    {
        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    /**
     * Actualizar una cita
     */
    public function update(Request $request, Cita $cita)
    {
        $cita->update($request->all());

        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    /**
     * Eliminar una cita
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return response()->json([
            'message' => 'Cita eliminada correctamente'
        ]);
    }
}
