<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlightController extends Controller
{
    public static $types = [

        ['id' => '1', 'name' => 'National'],
        ['id' => '2', 'name' => 'International'],
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Flights';
        $viewData['subtitle'] = 'List of flights';
        $viewData['flights'] = Flight::all();
        $viewData['flights'] = Flight::orderBy("price", "asc")->get();

        return view('flight.index')->with('viewData', $viewData);;
    }

   

public function show(): View
{
    $flightArr = Flight::all();
    $count = 0;
    $international = 0;
    $national = 0;
    foreach ($flightArr as $flight){
        $count+=1;
        if (($flight->getType())=="International")
        {
            $international=+1;
        }
        else {
            $national=+1;
        }
    }

    $viewData = []; 

    $viewData['international'] = $international;
    $viewData['national'] = $national;
    return view('flight.show')->with('viewData', $viewData);
}

    public function mainMenu(): View
    {
        return view('flight.mainMenu');
    }

    public function create(): View
    {
        $viewData = []; 

        $viewData['types'] = FlightController::$types;
        $viewData['title'] = 'Create flight';

        return view('flight.create')->with('viewData', $viewData)->with('types', FlightController::$types);
    }

    public function save(Request $request): View
    {
        $flight = new Flight();

        $flight ->setName($request->input('name'));
        $flight ->setTakeOffTime($request->input('take_off_time'));
        $flight ->setArrivingTime($request->input('arriving_time'));
        $flight ->setTakeOffPlace($request->input('take_off_place'));
        $flight ->setDestination($request->input('destination'));
        $flight ->setType($request->input('flight_type'));
        $flight ->setPrice($request->input('price'));

        $flight->save();

        return view('flight.save');
    }

    public function delete($id): RedirectResponse
    {
        
        $flight = Flight::find($id);
        $flight->delete();

        return redirect()->route('flight.index')->with('success', 'flight deleted successfully');
    }
}
