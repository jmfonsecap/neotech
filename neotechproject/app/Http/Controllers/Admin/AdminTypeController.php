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
        $viewData['title'] = __('messages.admin.type.table.title');
        $viewData['types'] = Type::all();

        return view('admin.type.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $type = Type::findOrFail($id);
        $viewData['type'] = $type;

        return view('admin.type.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.types.create');

        return view('admin.type.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        $type = new Type();
        Type::validate($request);
        $type->setName($request->input('name'));
        $type->setIsBase($request->input('is_base'));
        $type->save();
        $viewData = [];
        $viewData['title'] = __('messages.admin.types.create');
        session()->flash('status', __('messages.admin.types.created'));

        return view('admin.type.create')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $type = Type::findOrFail($id);
        $viewData['title'] = __('messages.admin.types.edit');
        $viewData['type'] = $type;

        return view('admin.type.edit')->with('viewData', $viewData);
    }

    public function update(string $id, Request $request): View
    {
        $type = Type::findOrFail($id);
        $type->validate($request);
        //update
        Type::where('id', $id)->update($request->only(['name','is_base']));
        $viewData = [];
        $viewData['title'] = __('messages.admin.type.table.title');
        $types = Type::all();
        $viewData['types'] = $types;
        session()->flash('status', __('messages.admin.types.updated'));

        return view('admin.type.index')->with('viewData', $viewData);
    }

    public function delete(string $id)
    {
        $viewData = [];
        $viewData['types'] = Type::all();
        $type = Type::findOrFail($id);
        $parts = $type->getParts();
        
        $parts->each(function ($part) {
            $part->delete();
        });
        $type->delete();
        $viewData['types'] = Type::all();
        $viewData['title'] = __('messages.admin.type.table.title');
        session()->flash('status', __('messages.admin.types.deleted'));

        return view('admin.type.index')->with('viewData', $viewData);
    }
}
