<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\View\View;
use App\Models\Part;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class HomeController extends Controller
{
    public function index(): View
    {
        $computers = Computer::all();
        $computersInDiscount = [];
        foreach ($computers as $computer) {
            if ($computer->getDiscount()) {
                array_push($computersInDiscount, $computer);
            }
        }
        $viewData = [];
        if (count($computersInDiscount) === 0) {
            $viewData['computersAreInDiscount'] = false;
        } else {
            $viewData['computersAreInDiscount'] = true;
            $viewData['computersInDiscount'] = $computersInDiscount;
            $viewData['computers'] =$computers;
            $viewData['sizeOfComputerArray'] = count($computersInDiscount);
        }

        return view('user.home.index')->with('viewData', $viewData);
    }
    public function search(Request $request):View
    {
        $computers = Computer::all();
        $parts= Part::all();
        $viewData['computers']= $computers;
        $viewData['parts']= $parts;
        $searchResults = (new Search())
            ->registerModel(Computer::class, 'name')
            ->registerModel(Part::class, 'name')
            ->perform($request->input('query'));

        return view('search', compact('searchResults'))->with('viewData', $viewData);
    }

}
