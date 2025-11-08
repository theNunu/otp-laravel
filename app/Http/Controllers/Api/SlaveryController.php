<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlaveryRequest;
use App\Services\SlaveryService;

class SlaveryController extends Controller
{
    protected $slaveryService;

    public function __construct(SlaveryService $slaveryService)
    {
        $this->slaveryService = $slaveryService;
    }

    public function index()
    {
        return response()->json($this->slaveryService->getAll());
    }
    public function store(SlaveryRequest $request)
    {
        return response()->json($this->slaveryService->create($request->validated()), 201);
    }


}
