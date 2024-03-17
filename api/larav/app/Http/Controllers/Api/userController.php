<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        $list = [];

        foreach ($users as $user) {
            $object = [
                "id" => $user->id,
                "name" => $user->name,
                "surname" => $user->surname,
                "email" => $user->email,
                "phone" => $user->phone,
                "image" => $user->image,
                "created" => $user->created_at,
                "updated" => $user->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id)
    {
        $user = User::where('id', '=', $id)->first();
        $object = [
            "id" => $user->id,
            "name" => $user->name,
            "surname" => $user->surname,
            "email" => $user->email,
            "phone" => $user->phone,
            "image" => $user->image,
            "created" => $user->created_at,
            "updated" => $user->updated_at
        ];

        return response()->json($object);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:3|max:20',
            'password' => 'required|min:3|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Verificar si el directorio de imágenes de usuarios existe y crearlo si no existe
        $directory = public_path('images/users/');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
    
        // Procesamiento de la imagen y creación del usuario
        $imageData = base64_decode($request->image);
        $imageName = 'user_' . time() . '.png';
        $path = $directory . $imageName;
        file_put_contents($path, $imageData);
    
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'image' => $path,
        ]);
    
        if ($user) {
            return response()->json([
                "success" => true,
                "message" => "Usuario creado correctamente",
                "data" => $user
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Error al crear el usuario"
            ], 500);
        }
    }
    

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|min:1',
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required|min:3|max:20',
            'password' => 'required|min:3|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Verificar si el directorio de imágenes de usuarios existe y crearlo si no existe
        $directory = public_path('images/users/');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }

        // Procesamiento de la imagen y actualización del usuario
        $imageData = base64_decode($request->image);
        $imageName = 'user_' . time() . '.png';
        $path = $directory . $imageName;
        file_put_contents($path, $imageData);

        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->image = $path;

        if ($user->save()) {
            return response()->json([
                "success" => true,
                "message" => "Usuario actualizado correctamente",
                "data" => $user
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Error al actualizar el usuario"
            ], 500);
        }
    }
}
