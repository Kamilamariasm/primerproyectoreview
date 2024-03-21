<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            $user = Auth::user();

            return response()->json([
                'user_id' => $user->id,
                'access_token' => $user->createToken('authToken')->plainTextToken,
                'message' => 'Login successful',
            ]);
        } catch (\Exception $e) {
            // Registra el error para su posterior depuración
            \Log::error('Error al iniciar sesión: ' . $e->getMessage());
            
            // Devuelve un mensaje de error genérico para evitar revelar información sensible
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
