<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
{
    $total = 0;
    $itemsInCart = [];
    $computersInSession = $request->session()->get('computers');
    echo(json_encode($computersInSession));
    echo("Gono");
    $partsInSession = $request->session()->get('parts');
    echo(json_encode($partsInSession));
    if ($partsInSession) {
        $itemIds = array_keys($partsInSession);
        $itemsInCart = Item::findMany(array_keys($partsInSession));
        echo($itemsInCart);
        $total = Item::sumPricesByQuantities($itemsInCart, $partsInSession);
    }
    $viewData = [];
    $viewData['title'] = 'Cart - Online Store';
    $viewData['subtitle'] = 'Shopping Cart';
    $viewData['total'] = $total;
    $viewData['computers'] = $itemsInCart;
    $viewData['parts'] = $itemsInCart;

    return view('cart.index')->with('viewData', $viewData);
}

    public function addComputer(Request $request, $id)
    {
        $computers = $request->session()->get('computers', []);
        echo("Add method: ");
        echo(json_encode($computers));
        $computers[$id] = $request->input('quantity');
        $request->session()->put('computers', $computers);

        return redirect()->route('cart.index');
    }

    public function addPart(Request $request, $id)
    {
        $parts = $request->session()->get('parts', []);
        echo("Add method: ");
        $parts[$id] = $request->input('quantity');
        $request->session()->put('parts', $parts);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('items');

        return back();
    }
}
