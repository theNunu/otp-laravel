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
            'contrasena del user' => $user['password']
        ];
    }

    public function login(array $data)
    {

        $user = $this->users->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return null;
        }

        return [
            'user' => $user,
            // 'contrasena del user' => $user->getAttributes()['password']
        ];
    }

    public function reset(array $data)
    {

        $user = $this->users->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return null;
        }

        return [
            'user' => $user,
            // 'contrasena del user' => $user->getAttributes()['password']
        ];
    }
}
