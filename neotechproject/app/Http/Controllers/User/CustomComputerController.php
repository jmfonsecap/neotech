<?php

namespace App\Http\Controllers\User;

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
        $viewData['types'] = Type::whereHas('parts')->where('is_base',true)->get();

        return view('user.custom.create')->with('viewData', $viewData);
    }
}
