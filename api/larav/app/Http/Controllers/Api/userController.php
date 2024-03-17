<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list() {
        $users = User::all();
        $list = [];

        foreach($users as $user) {
            $object = [
                "id"=>$user->id,
                "name"=>$user->name,
                "surname"=>$user->surname,
                "email"=>$user->email,
                "phone"=>$user->phone,
                "image"=>$user->image,
                "created"=>$user->created_at,
                "updated"=>$user->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $user = User::where('id', '=', $id)->first();
        $object = [
            "id"=>$user->id,
            "name"=>$user->name,
            "surname"=>$user->surname,
            "email"=>$user->email,
            "phone"=>$user->phone,
            "image"=>$user->image,
            "created"=>$user->created_at,
            "updated"=>$user->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name'=> 'required|min:3,max:20',
            'surname'=> 'required|min:3,max:20',
            'email'=> 'required|min:3,max:20',
            'phone'=> 'required|min:3,max:20',
            'password'=> 'required|min:3,max:20',
            'image'=> 'required|min:3,max:20'
        ]);

        // Procesamiento de la imagen
        $imageData = base64_decode($data['image']);
        $imageName = 'user_' . time() . '.png'; // Genera un nombre único para la imagen
        $path = public_path('images/users/' . $imageName);
        file_put_contents($path, $imageData);

        // Creación del usuario con la ruta de la imagen
        $user = User::create([
            'name'=> $data['name'],
            'surname'=> $data['surname'],
            'email'=> $data['email'],
            'phone'=> $data['phone'],
            'password'=> Hash::make($data['password']),
            'image'=> $path // Guarda la ruta de la imagen en la base de datos
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

    public function update(Request $request) {
        $data = $request->validate([
            'id'=> 'required|integer|min:1',
            'name'=> 'required|min:3,max:20',
            'surname'=> 'required|min:3,max:20',
            'email'=> 'required|min:3,max:20',
            'phone'=> 'required|min:3,max:20',
            'password'=> 'required|min:3,max:20',
            'image'=> 'required|min:3,max:20'
        ]);

        $user = User::find($data['id']);

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }

        // Procesamiento de la imagen
        $imageData = base64_decode($data['image']);
        $imageName = 'user_' . time() . '.png'; // Genera un nombre único para la imagen
        $path = public_path('images/users/' . $imageName);
        file_put_contents($path, $imageData);

        // Actualización de los datos del usuario
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
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
