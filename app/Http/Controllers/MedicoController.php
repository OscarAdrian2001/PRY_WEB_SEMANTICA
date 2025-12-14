<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Resources\MedicoResource;

class MedicoController extends Controller
{
    /**
     * Listar médicos
     */
    public function index()
    {
        return MedicoResource::collection(Medico::with('especialidad')->get());
    }

    /**
     * Guardar un médico
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string',
            'especialidad_id' => 'required|exists:especialidades,id',
        ]);

        $medico = Medico::create($request->all());

        return new MedicoResource($medico->load('especialidad'));
    }

    /**
     * Mostrar un médico
     */
    public function show(Medico $medico)
    {
        return new MedicoResource($medico->load('especialidad'));
    }

    /**
     * Actualizar médico
     */
    public function update(Request $request, Medico $medico)
    {
        $medico->update($request->all());

        return new MedicoResource($medico->load('especialidad'));
    }

    /**
     * Eliminar médico
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return response()->json([
            'message' => 'Médico eliminado correctamente'
        ]);
    }
}
