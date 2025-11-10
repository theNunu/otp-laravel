<?php

namespace App\Services;

use App\Models\Slavery;
use App\repositories\SlaveryRepository;
use Illuminate\Support\Str;

class SlaveryService
{
    protected $slaveryRepository;

    public function __construct(SlaveryRepository $slaveryRepository)
    {
        $this->slaveryRepository = $slaveryRepository;
    }

    public function getAll()
    {
        return $this->slaveryRepository->all();
    }

    public function create(array $data)
    {
        $username = Str::lower(Str::charAt($data['first_name'], 0) . $data['last_name']);

        //----
        $count = Slavery::where('username', 'like', "{$username}%")->count();
        /*
        'username', 'like', "{$username}%" → busca todos los registros cuyo username empiece con lo que haya en la variable $username.
         */

        // dd($count);
        // Si no hay ninguno, se usa el base directamente
        // Si hay coincidencias, se agrega el número siguiente
        $username = $count > 0 ? "{$username}" . ($count + 1) : $username;
        /*
        Si $count es mayor que 0 (es decir, ya hay usernames parecidos),
        entonces crea uno nuevo agregando un número.

        Si no hay ninguno, usa el base original.

        Ejemplo con los datos de antes: 
        
        */

        $data['username'] = $username;
        //----

        return $this->slaveryRepository->create($data, $username);
    }
}
