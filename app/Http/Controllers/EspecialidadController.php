<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Http\Resources\EspecialidadResource;

class EspecialidadController extends Controller
{
    /**
     * Listar especialidades
     */
    public function index()
    {
        return EspecialidadResource::collection(Especialidad::all());
    }

    /**
     * Guardar una especialidad
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad = Especialidad::create($request->all());

        return new EspecialidadResource($especialidad);
    }

    /**
     * Mostrar una especialidad
     */
    public function show(Especialidad $especialidad)
    {
        return new EspecialidadResource($especialidad);
    }

    /**
     * Actualizar especialidad
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $especialidad->update($request->all());

        return new EspecialidadResource($especialidad);
    }

    /**
     * Eliminar especialidad
     */
    public function destroy(Especialidad $especialidad)
    {
        $especialidad->delete();

        return response()->json([
            'message' => 'Especialidad eliminada correctamente'
        ]);
    }
}
