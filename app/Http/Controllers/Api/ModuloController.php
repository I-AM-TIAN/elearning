<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Leccion;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
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
        //Muestra la información de un módulo asociado a sus lecciones

        $modulo = Modulo::where('uuid', $id)->first();

        if (!$modulo) {
            $data = [
                'message' => "No se ha encontrado el modulo",
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $curso = Curso::where('id', $modulo->id_curso)->first();

        if (!$curso) {
            $data = [
                'message' => "No se ha encontrado el curso",
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $lecciones = Leccion::where('id_modulo', $modulo->id)->get();

        if ($lecciones->isEmpty()) {
            $data = [
                'message' => "No se han encontrado lecciones",
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $data = [
            'curso' => $curso,
            'modulo' => $modulo,
            'lecciones' => $lecciones
        ];

        return response()->json($data);

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
