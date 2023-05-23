<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Contracts\View\View;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Computers dashboard';
        $viewData['computers'] = Computer::all();

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName().' - Neotech';
        $viewData['subtitle'] = $computer->getName().' - Computer information';
        $viewData['computer'] = $computer;
        $viewData['keywords'] = explode(',', $computer->getKeywords());

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
        $imageName = substr(sha1(mt_rand()),17,6).'-computer.'.$request->file('photo')->extension();
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $imageName);
        $computer->setPhoto($imageName);
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
        $viewData = [];
        //update
        Computer::where('id', $id)->update($request->only(['name', 'stock', 'brand', 'category',
            'currentPrice', 'lastPrice', 'details']));
        if ($request->hasFile('photo')) {
            $imageName = $computer->getId().'.'.$request->file('photo')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('photo')->getRealPath())
            );
            $computer->setPhoto($imageName);
            $computer->save();
        }
        $viewData['computer'] = $computer;
        $viewData['keywords'] = explode(',', $computer->getKeywords());

        return view('admin.computer.show')->with('viewData', $viewData)->with('status', 'updated')->with('id', $id);
    }

    public function delete(string $id)
    {
        $viewData = [];
        $viewData['title'] = 'Computers dashboard';
        Computer::findOrFail($id);
        Computer::where('id', $id)->delete();
        $viewData['computers'] = Computer::all();
        session()->flash('status', 'Computer successfully deleted.');

        return view('admin.computer.index')->with('viewData', $viewData);
    }
}
