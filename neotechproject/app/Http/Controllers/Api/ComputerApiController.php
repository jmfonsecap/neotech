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
        $computers = Computer::where('discount', '>', 0)->get();
        $collect = ComputerResource::collection($computers);    
        return response()->json($collect, 200);
    }

    public function show(string $id): JsonResponse
    {
        $computer = new ComputerResource(Computer::findOrFail($id));
        return response()->json($computer, 200);
    }
}