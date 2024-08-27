<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(){
        $usuarios = User::all();

        if ($usuarios->isEmpty()) {
            $data = [
                'message' => 'No students found',
                'status' => 200,
            ];
            return response()->json($data, 200);
        }

        return response()->json($usuarios, 200);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $user = User::create([
            'name' => $request->name,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => 2
        ]);

        if(!$user){
            $data = [
                'message' => 'Failed to create student',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'student' => $user,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
