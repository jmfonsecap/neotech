<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('user.computers.title');
        $viewData['subtitle'] = __('user.computers.subtitle');
        $viewData['computers'] = Computer::all();

        return view('user.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $reviews = $computer->reviews;
        $viewData['title'] = $computer['name'].' - Neotech';
        $viewData['subtitle'] = $computer['name'].__('user.computers.information');
        $viewData['computer'] = $computer;
        $viewData['computer_id'] = $id;
        $viewData['reviews'] = $reviews;

        return view('user.computer.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create computer';

        return view('user.computer.create')->with('viewData', $viewData);
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
        $computer->setKeywords($request->input('keywords'));
        $computer->setCurrentPrice($request->input('currentPrice'));
        if ($request->input('discount') != null) {
            $computer->setDiscount($request->input('discount'));
            $computer->setLastPrice($request->input('lastPrice'));
        }

        $computer->setDetails($request->input('details'));

        $computer->save();

        return view('user.computer.save');
    }

    public function delete($id): RedirectResponse
    {
        $computer = Computer::find($id);
        $computer->delete();

        return redirect()->route('user.computer.index')->with('success', 'Computer deleted successfully');
    }
}
