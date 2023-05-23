<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('user.parts.title');
        $viewData['subtitle'] = __('user.parts.subtitle');
        $viewData['parts'] = Part::all();

        return view('part.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $part = Part::findOrFail($id);
        $type = $part->type;
        $viewData['title'] = __('messages.admin.parts.info');
        $viewData['part'] = $part;
        $viewData['type_name'] = $type->getName();

        return view('part.show')->with('viewData', $viewData);
    }


    public function create(): View
    {
        $viewData = [];

        $viewData['types'] = Type::all();
        $viewData['title'] = __('admin.parts.create');

        return view('part.create')->with('viewData', $viewData)->with('types', Type::all());
    }

    public function save(Request $request): View
    {
        Part::validate($request);

        $part = new Part();
        $part->setName($request->input('name'));
        $part->setStock($request->input('stock'));
        $part->setBrand($request->input('brand'));
        $part->setType($request->input('type'));
        $part->setPrice($request->input('price'));
        $part->setDetails($request->input('details'));

        $part->save();

        return view('part.save');
    }

    public function delete($id): RedirectResponse
    {
        $part = Part::find($id);
        $part->delete();

        return redirect()->route('part.index')->with('success', 'Part deleted successfully');
    }
}
