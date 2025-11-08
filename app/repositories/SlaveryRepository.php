<?php

namespace App\repositories;

use App\Models\Slavery;

class SlaveryRepository
{
    public function all()
    {
        return Slavery::get();
    }

    public function create(array $data, string $username){

        return Slavery::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $username,
            ]
    );

    }


}
