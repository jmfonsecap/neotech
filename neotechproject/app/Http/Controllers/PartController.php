<?php

namespace App\Http\Controllers;

use App\Models\Part;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartController extends Controller
{
  
    public static $types = [

        ['id' => '1', 'name' => 'RAM'],
        ['id' => '2', 'name' => 'CPU'],
        ['id' => '3', 'name' => 'GPU'],
        ['id' => '4', 'name' => 'Peripheric'],
        ['id' => '5', 'name' => 'Battery'],
        ['id' => '6', 'name' => 'Other'],
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Parts - Online Store';
        $viewData['subtitle'] = 'List of parts';
        $viewData['parts'] = Part::all();

        return view('part.index')->with('viewData', $viewData);;
    }

    public function show(string $id): View
{
    $part = Part::findOrFail($id);
    $viewData = [
        'title' => $part->getName($id).' - Online Store',
        'subtitle' => $part->getName($id).' - Product information',
        'part' => $part,
    ];

    return view('part.show', $viewData);
}


    public function mainMenu(): View
    {
        return view('part.mainMenu');
    }

    public function create(): View
    {
        $viewData = []; 

        $viewData['types'] = PartController::$types;
        $viewData['title'] = 'Create part';

        return view('part.create')->with('viewData', $viewData)->with('types', PartController::$types);
    }

    public function save(Request $request): View
    {
        Part::validate($request);

        $part = new Part();

        $part ->setName($request->input('name'));
        $part ->setStock($request->input('stock'));
        $part ->setBrand($request->input('brand'));
        $part ->setType($request->input('type'));
        $part ->setPrice($request->input('price'));
        $part ->setDetails($request->input('details'));

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
