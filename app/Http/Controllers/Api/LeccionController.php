<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Leccion;
use App\Models\Modulo;
use Illuminate\Http\Request;

class LeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leccion = Leccion::find($id);
        if (!$leccion) {
            return response()->json(['message' => 'Lección no encontrada.'], 404);
        }

        $leccion->visto = true;
        $leccion->save();

        $modulo = $leccion->modulo;
        if (!$modulo) {
            return response()->json(['message' => 'Módulo no encontrado.'], 404);
        }

        $curso = $modulo->curso;
        if (!$curso) {
            return response()->json(['message' => 'Curso no encontrado.'], 404);
        }

        $curso->actualizarProgreso();

        return response()->json(['message' => 'Lección completada y progreso actualizado.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
