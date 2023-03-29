<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Computers dashboard';
        $viewData['types'] = Type::all();

        return view('admin.type.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $type = Type::findOrFail($id);
        $viewData['title'] = $type['name'].' - Neotech';
        $viewData['type'] = $type;

        return view('admin.type.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create type';

        return view('admin.type.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        $type = new Type();
        Type::validate($request);
        $type->setName($request->input('name'));
        $type->save();

        return view('admin.type.create')->with('status', 'created');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $type = Type::findOrFail($id);
        $viewData['title'] = $type['name'].' - Neotech';
        $viewData['type'] = $type;

        return view('admin.type.edit')->with('viewData', $viewData);
    }

    public function update(string $id, Request $request): View
    {
        $type = Type::findOrFail($id);
        $type->validate($request);
        //update
        Type::where('id', $id)->update($request->only(['name']));

        return view('admin.type.show')->with('status', 'updated');
    }

    public function delete(string $id)
    {
        $viewData = [];
        $viewData['title'] = 'Types dashboard';
        $viewData['types'] = Type::all();
        Type::findOrFail($id);
        Type::where('id', $id)->delete();

        return back()->with('status', 'deleted')->with('viewData', $viewData);
    }
}
