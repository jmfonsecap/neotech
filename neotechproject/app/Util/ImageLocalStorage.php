<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $imageName): void
    {
        if ($request->hasFile('photo')) {
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('photo')->getRealPath())
            );

        }
    }
}
