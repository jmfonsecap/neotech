<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Computer;

class HomeController extends Controller
{
    public function index(): View
    {
        $computers =  Computer::all();
        $computersInDiscount = [];
        foreach ( $computers as $computer){
            if ($computer->getDiscount()){
                array_push($computersInDiscount, $computer);
            }
        }
        $viewData = [];
        if (count($computersInDiscount) === 0)
        {
            $viewData['computersAreInDiscount'] = false;
        }else {
            $viewData['computersAreInDiscount'] = true;
            $viewData['computersInDiscount'] = $computersInDiscount;
            $viewData['sizeOfComputerArray'] = count($computersInDiscount);
        }
        
        return view('home.index')->with('viewData', $viewData);
    }
}
