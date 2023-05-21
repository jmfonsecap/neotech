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
        $itemsInSession = $request->session()->get('items');
        if ($itemsInSession) {
            $itemsInCart = Item::findMany(array_keys($itemsInSession));
            $total = Item::sumPricesByQuantities($itemsInCart, $itemsInSession);
        }
        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['items'] = $itemsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $items = $request->session()->get('items');
        $items[$id] = $request->input('quantity');
        $request->session()->put('items', $items);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('items');

        return back();
    }
}
