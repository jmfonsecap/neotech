<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.computer.table.title');
        $viewData['computers'] = Computer::all();

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName().__('messages.admin.computers.info');
        $viewData['computer'] = $computer;
        $viewData['keywords'] = explode(',', $computer->getKeywords());

        return view('admin.computer.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.computers.create');

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
        if ($request->hasFile('photo')) {
            $imageName = $computer->getId().'.'.$request->file('photo')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('photo')->getRealPath())
            );
            $computer->setPhoto($imageName);
            $computer->save();
        }
        $viewData = [];
        $viewData['title'] = __('messages.admin.computers.create');
        session()->flash('status', __('messages.admin.computers.created'));

        return view('admin.computer.create')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = __('messages.admin.computers.edit');
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
            'currentPrice', 'lastPrice', 'details', 'keywords']));
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
        $viewData['title'] = $computer->getName().__('messages.admin.computers.info');
        session()->flash('status', __('messages.admin.computers.updated'));

        return view('admin.computer.show')->with('viewData', $viewData);
    }

    public function delete(string $id)
    {
        $viewData = [];
        $viewData['title'] = 'Computers dashboard';
        Computer::findOrFail($id);
        Computer::where('id', $id)->delete();
        $viewData['computers'] = Computer::all();
        session()->flash('status', __('messages.admin.computers.deleted'));

        return view('admin.computer.index')->with('viewData', $viewData);
    }
}
