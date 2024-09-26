<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use App\Models\Modulo;
use App\Models\User;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function completarModulo($usuarioId, $moduloId)
    {
        // Verificar si el usuario existe
        $user = User::where('uuid', $usuarioId)->first();
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Verificar si el módulo existe
        $modulo = Modulo::where('uuid', $moduloId)->first();
        if (!$modulo) {
            return response()->json(['error' => 'Módulo no encontrado'], 404);
        }

        // Verificar si la inscripción existe
        $inscripcion = Inscripcion::where('usuario_id', $user->id)
            ->where('modulo_id', $modulo->id)
            ->first();
        if (!$inscripcion) {
            return response()->json(['error' => 'Inscripción no encontrada'], 404);
        }

        // Marcar el módulo como completado
        $inscripcion->completado = true;
        $inscripcion->save();

        // Buscar el siguiente módulo
        $siguienteModulo = Modulo::where('id_curso', $modulo->id_curso)
            ->where('orden', '>', $modulo->orden)
            ->whereDoesntHave('inscripciones', function ($query) use ($user) {
                $query->where('usuario_id', $user->id)
                    ->where('completado', true);
            })
            ->orderBy('orden')
            ->first();

        // Si hay un siguiente módulo
        if ($siguienteModulo) {
            $inscripcion->modulo_id = $siguienteModulo->id;
            $inscripcion->completado = false;
            $inscripcion->save();
        }

        return response()->json([
            'message' => 'Módulo completado con éxito',
            'siguiente_modulo_id' => $siguienteModulo ? $siguienteModulo->id : null
        ]);
    }


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
