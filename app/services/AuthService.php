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

        return [
            'user' => $user,
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

        return [
            'user' => $user,

        ];
    }

}
