<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function anything(){
        return "holaaaa, holaaaa";
    }

    public function indexUsers(){

        $users = $this->authService->indexUsers();

        return response()->json([
            'data' => $users
        ]);

    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only(['name', 'username', 'email', 'password']);

        $result = $this->authService->register($data);

        return response()->json([
            'message' => 'Usuario registrado correctamente.',
            'user' => $result,
            // 'token' => $result['token'],
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);
        $result = $this->authService->login($data['email'], $data['password']);

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'user' => $result['user'],
        ]);
    }

    // public function logout(Request $request)
    // {
    //     $header = $request->header('Authorization'); // Bearer token
    //     $token = null;
    //     if ($header && preg_match('/Bearer\s+(.+)/', $header, $matches)) {
    //         $token = $matches[1];
    //     } else {
    //         $token = $request->get('api_token');
    //     }

    //     if (!$token) {
    //         return response()->json(['message' => 'Token no proporcionado.'], 400);
    //     }

    //     $this->authService->logout($token);

    //     return response()->json(['message' => 'Cierre de sesión correcto.']);
    // }
}
