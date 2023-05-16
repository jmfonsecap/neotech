<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPartController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.part.table.title');
        $viewData['parts'] = Part::all();

        return view('admin.part.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $part = Part::findOrFail($id);
        $type = $part->type;
        $viewData['title'] = __('messages.admin.parts.info');
        $viewData['part'] = $part;
        $viewData['type_name'] = $type->getName();

        return view('admin.part.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.parts.create');
        $viewData['types'] = Type::all();

        return view('admin.part.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        $part = new Part();
        Part::validate($request);
        $part->setName($request->input('name'));
        $part->setStock($request->input('stock'));
        $part->setBrand($request->input('brand'));
        $type = Type::findOrFail($request['types']);
        $part->setTypeId($type->getId());
        $part->setPrice($request->input('price'));
        $part->setDetails($request->input('details'));
        $part->save();
        if ($request->hasFile('photo')) {
            $imageName = $part->getId().'.'.$request->file('photo')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('photo')->getRealPath())
            );
            $part->setPhoto($imageName);
            $part->save();
        }
        $viewData = [];
        $viewData['title'] = __('messages.admin.parts.create');
        $viewData['types'] = Type::all();
        session()->flash('status', __('messages.admin.parts.created'));

        return view('admin.part.create')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $part = Part::findOrFail($id);
        $viewData['title'] = $part['name'].' - Neotech';
        $viewData['subtitle'] = $part['name'].' - Part information';
        $viewData['part'] = $part;

        return view('admin.part.edit')->with('viewData', $viewData);
    }

    public function update(string $id, Request $request): View
    {
        $part = Part::findOrFail($id);
        $part->validate($request);
        //update
        Part::where('id', $id)->update($request->only(['name', 'photo', 'stock', 'brand', 'type',
            'price', 'details']));

        return view('admin.part.show')->with('status', 'updated');
    }

    public function delete(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Parts dashboard';
        Part::findOrFail($id);
        Part::where('id', $id)->delete();
        $viewData['parts'] = Part::all();

        return view('admin.part.index')->with('viewData', $viewData);

        return view('admin.part.index')->with('status', 'deleted');
    }
}
