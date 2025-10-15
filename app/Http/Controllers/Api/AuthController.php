<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\MailableName;
use App\Models\Otp;
use App\Models\User;
use App\Services\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $authService;
    use ApiResponse;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function anything()
    {
        return "holaaaa, holaaaa";
    }

    public function indexUsers()
    {

        $users = $this->authService->indexUsers();

        return response()->json([
            'data' => $users
        ]);
    }

    public function register(RegisterRequest $request)
    {
        // $data = $request->only(['name', 'username', 'email', 'password']);
        try {
            $result = $this->authService->register($request->validated());
            return $this->createdResponse($result, 'Registro exitoso');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function login(LoginRequest $request)
    {

        try {

            $result = $this->authService->login($request->validated());

            if (!$result) {
                return $this->invalidCredentialsResponse();
            }

            return $this->successResponse($result, 'Inicio de sesión exitoso');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getOtps()
    {

        $otps = $this->authService->conseguirOtps();

        return response()->json([
            'data' => $otps
        ]);
    }

    public function sendOtp(LoginRequest $request)
    {

        try {

            $result = $this->authService->reset($request->validated());

            if (!$result) {
                return $this->invalidCredentialsResponse();
            }

  

            return $this->successResponse($result, 'todo bien para el reseteo');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
