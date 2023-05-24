<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\User;
use App\Models\CustomComputer;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function save(Request $request): View
    {
        $user_id = Auth::id();

        CustomComputer::validate($request);
        $custom = new CustomComputer();
        $custom->setName($request->input('name'));
        $custom->setUserId($user_id);
        $custom->save();
        $custom->parts()->attach($request['parts']);

        // calculate the custom pc price as the accumulate of the parts's price
        $price = 0;
        $parts = $custom->getParts();
        foreach($parts as $part){
            $price+=$part->getPrice();
        }
        $custom->setPrice($price);
        $custom->save();
        $viewData = [];
        $viewData['title'] = __('messages.admin.computer.table.title');
        $viewData['types'] = Type::whereHas('parts')->where('is_base',true)->get();

        return view('user.custom.create')->with('viewData', $viewData);
    }
}