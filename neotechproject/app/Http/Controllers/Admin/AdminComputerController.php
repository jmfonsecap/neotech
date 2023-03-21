<?php

namespace App\Http\Controllers\Admin;

use App\Models\Computer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Computers dashboard";
        $viewData["computers"] = Computer::all();
        return view('admin.computer.index')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create part';
        return view('admin.computer.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        $computer = new Computer();
        Computer::validate($request);
        $computer->setName($request->input('name'));
        $computer->setPhoto($request->input('photo'));
        $computer->setStock($request->input('stock'));
        $computer->setBrand($request->input('brand'));
        $computer->setCategory($request->input('category'));
        $computer->setCurrentPrice($request->input('currentPrice'));
        if ($request->input('discount') != null) {
            $computer->setDiscount($request->input('discount'));
            $computer->setLastPrice($request->input('lastPrice'));
        }
        $computer->setDetails($request->input('details'));
        $keywords = implode(',', $request->input('keywords'));
        $computer->setKeywords($keywords);

        $computer->save();

        return view('admin.computer.create')->with('status', 'created');
    }
}   
