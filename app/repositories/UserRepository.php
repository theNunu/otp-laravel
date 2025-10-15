<?php

namespace App\repositories;

use App\Models\User;

class UserRepository 
{

    public function getUsers(){
        return User::select('id','name', 'username')->get();
    }

    public function getUserById(int $id){
        return User::where('id', $id)->first();
    }
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }
}
