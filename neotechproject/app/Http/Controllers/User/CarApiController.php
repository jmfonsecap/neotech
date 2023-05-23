<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class CarApiController extends Controller
{
    public function index(Request $request): View
    {

        $url = 'http://sebastianpg.pro/api/cars';
        $json = Http::get($url);

        return view('user.rickandmorty.index')->with('data', $json);
    }
}