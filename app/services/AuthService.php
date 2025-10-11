<?php

namespace App\Services;

use App\repositories\UserRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function indexUsers()
    {
        return $this->users->getUsers();
    }


    public function register(array $data)
    {
        // hashear password
        $data['password'] = Hash::make($data['password']);
        // crear usuario
        $user = $this->users->create($data);
        // generar token
        // $token = $this->generateToken();
        // $this->users->update($user, ['api_token' => $token]);

        return [
            'user' => $user,
            // 'token' => $token,
        ];
    }

    public function login(string $email, string $password)
    {
        $user = $this->users->findByEmail($email);
        
        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales incorrectas.'],
            ]);
        }
        // $token = $this->generateToken();
        // $this->users->update($user, ['api_token' => $token]);

        return [
            'user' => $user,
            // 'token' => $token,
        ];
    }

    // public function logout(string $token)
    // {
    //     $user = $this->users->findByToken($token);
    //     if ($user) {
    //         $this->users->update($user, ['api_token' => null]);
    //         return true;
    //     }
    //     return false;
    // }

    // protected function generateToken(): string
    // {
    //     // token de 60 caracteres
    //     return hash('sha256', Str::random(60) . now()->timestamp);
    // }
}
