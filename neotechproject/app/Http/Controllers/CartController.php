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
    if ($computersInSession) {
        $itemIds = array_keys($computersInSession);
        echo(json_encode($itemIds));
        $itemsInCart = Item::findMany(array_keys($computersInSession));
        echo($itemsInCart);
        $total = Item::sumPricesByQuantities($itemsInCart, $computersInSession);
    }
    $viewData = [];
    $viewData['title'] = 'Cart - Online Store';
    $viewData['subtitle'] = 'Shopping Cart';
    $viewData['total'] = $total;
    $viewData['items'] = $itemsInCart;

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
        echo(json_encode($parts));
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
