<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::where('id_estado', 1)->get();

        if ($cursos->isEmpty()) {
            $data = [
                'message' => "No se han encontrado cursos",
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        return response()->json($cursos);
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
        $curso = Curso::where('uuid', $id)->first();
        if (!$curso) {
            $data = [
                'message' => "Curso no encontrado",
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($curso);
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
