<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{       
    
    public function getUserId(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Verificar si se encontró el ID del usuario
        if ($userId) {
            return response()->json(['user_id' => $userId]);
        } else {
            return response()->json(['error' => 'ID de usuario no encontrado'], 404);
        }
    }
    
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es opcional
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Procesamiento de la imagen y actualización del usuario
        $user = User::find($request->id);
    
        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }
    
        if ($request->has('name')) {
            $user->name = $request->name;
        }
    
        if ($request->has('surname')) {
            $user->surname = $request->surname;
        }
    
        if ($request->has('email')) {
            $user->email = $request->email;
        }
    
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
    
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($request->has('image')) {
            // Verificar si el directorio de imágenes de usuarios existe y crearlo si no existe
            $directory = public_path('images/users/');
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }
    
            // Procesar y guardar la nueva imagen
            $imageData = base64_decode($request->image);
            $imageName = 'user_' . time() . '.png';
            $path = $directory . $imageName;
            file_put_contents($path, $imageData);
    
            // Eliminar la imagen anterior si existe
            if ($user->image && File::exists($user->image)) {
                File::delete($user->image);
            }
    
            // Actualizar la ruta de la imagen del usuario
            $user->image = $path;
        }
    
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
    

    
    public function updateProfile(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar si se encontró el usuario autenticado
        if ($user) {
            // Validar los datos de entrada proporcionados en la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:20',
                'surname' => 'required|min:3|max:20',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|min:3|max:20',
                'password' => 'required|min:3|max:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Verificar si la validación falla
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de los datos',
                    'errors' => $validator->errors(),
                ], 422);
            }
    
            // Actualizar los campos del perfil del usuario
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->phone = $request->phone;
    
            // Verificar si se proporcionó una nueva contraseña
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
    
            // Verificar si se proporcionó una nueva imagen de perfil
            if ($request->hasFile('image')) {
                // Procesar y guardar la nueva imagen de perfil (tú debes implementar esta lógica)
            }
    
            // Guardar los cambios en el perfil del usuario
            $user->save();
    
            // Devolver una respuesta JSON indicando que la actualización se realizó con éxito
            return response()->json([
                'success' => true,
                'message' => 'Perfil actualizado correctamente',
                'data' => $user,
            ]);
        } else {
            // Devolver una respuesta JSON indicando que el usuario no se encontró
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado',
            ], 404);
        }
    }
    

    
        // Otros métodos del controlador...
    
        public function fetchUser($userId) {
            // Buscar el usuario en la base de datos
            $user = User::find($userId);
        
            // Verificar si se encontró el usuario
            if ($user) {
                // Devolver los datos del usuario
                return response()->json($user);
            } else {
                // Manejar el caso en que no se encuentre el usuario
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }
        }
        
        
}    