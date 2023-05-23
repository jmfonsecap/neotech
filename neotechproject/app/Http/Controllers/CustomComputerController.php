<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomComputerController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.computer.table.title');
        $viewData['types'] = Type::all();

        return view('custom.create')->with('viewData', $viewData);
    }
}
