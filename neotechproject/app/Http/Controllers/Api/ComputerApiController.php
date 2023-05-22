<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComputerResource;
use App\Models\Computer;
use Illuminate\Http\JsonResponse;

class ComputerApiController extends Controller
{
    public function index(): JsonResponse
    {
        $computers = ComputerResource::collection(Computer::all());
        return response()->json($computers, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = new ComputerResource(Computer::findOrFail($id));
        return response()->json($product, 200);
    }
}