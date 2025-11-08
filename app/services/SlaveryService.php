<?php

namespace App\Services;

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

        // dd($username);

        return $this->slaveryRepository->create($data, $username);
    }
}
