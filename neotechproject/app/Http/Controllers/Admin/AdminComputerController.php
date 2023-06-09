<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Contracts\View\View;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;


class AdminComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.computer.table.title');
        $viewData['computers'] = Computer::all();
        $viewData['labels'] = [
            __('messages.admin.label.name'),
            __('messages.admin.label.stock'),
            __('messages.admin.label.brand'),
            __('messages.admin.label.category'),
            __('messages.admin.label.price'),
            __('messages.admin.label.actions'),
        ];

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName(). __('messages.admin.computers.info');
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
        $imageName = substr(sha1(mt_rand()),17,6).'-computer.'.$request->file('photo')->extension();
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $imageName);
        $computer->setPhoto($imageName);
        $computer->save();
        $viewData = [];
        $viewData["title"] = __('messages.admin.computers.create');
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
        $imageName = $imageName = $computer->getPhoto();
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $imageName);
        $computer->setPhoto($imageName);
        $computer->save();
        $viewData['computer'] = $computer;
        $viewData['keywords'] = explode(',', $computer->getKeywords());
        $viewData['title'] = $computer->getName(). __('messages.admin.computers.info');
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
        $viewData['labels'] = [
            __('messages.admin.label.name'),
            __('messages.admin.label.stock'),
            __('messages.admin.label.brand'),
            __('messages.admin.label.category'),
            __('messages.admin.label.price'),
            __('messages.admin.label.actions'),
        ];
        session()->flash('status', __('messages.admin.computers.deleted'));

        return view('admin.computer.index')->with('viewData', $viewData);
    }
}
