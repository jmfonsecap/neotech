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

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer['name'].' - Neotech';
        $viewData['subtitle'] = $computer['name'].' - Computer information';
        $viewData['computer'] = $computer;

        return view('admin.computer.show')->with('viewData', $viewData);
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

    public function edit(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer['name'].' - Neotech';
        $viewData['subtitle'] = $computer['name'].' - Computer information';
        $viewData['computer'] = $computer;

        return view('admin.computer.edit')->with('viewData', $viewData);
    }

    public function update(string $id, Request $request): View
    {

        $computer = Computer::findOrFail($id);
        $computer->validate($request);
        //update
        Computer::where('id', $id)->update($request->only(['name', 'photo', 'stock', 'brand', 'category',
        'currentPrice', 'discount', 'lastPrice', 'details', 'keywords']));
        
        return view('admin.computer.show')->with('status', 'updated');
    }

    public function delete(string $id)
    {   
        $viewData = [];
        $viewData["title"] = "Computers dashboard";
        $viewData["computers"] = Computer::all();
        Computer::findOrFail($id);
        Computer::where('id', $id)->delete();
        return back()->with('status', 'deleted')->with('viewData', $viewData);
    }
}   
