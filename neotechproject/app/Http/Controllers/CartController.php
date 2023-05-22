<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
 public function index(Request $request)
 {
 $total = 0;
 $productsInCart = [];
 $productsInSession = $request->session()->get("products");
 $partsInCart = [];
 $computersInCart=[];
 echo(json_encode($productsInSession));
 foreach ($productsInSession as $product) {
     echo(json_encode($product));
     if ($product['type'] == 'part') {
         $partsInCart[] = $product;
     } else if ($product['type'] == 'computer'){
        $computersInCart[] = $product;
     }
 }
 echo("Partes: ");
 echo(json_encode($partsInCart));
 echo("Comps: ");
 echo(json_encode($computersInCart));

 //if ($productsInSession) {
 //$productsInCart = Product::findMany(array_keys($productsInSession));
 //$total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
 //}
 $viewData = [];
 $viewData["title"] = "Cart - Online Store";
 $viewData["subtitle"] = "Shopping Cart";
 $viewData["total"] = $total;
 $viewData["computers"] = $productsInCart;
 return view('cart.index')->with("viewData", $viewData);
 }

 public function add(Request $request, $id, $type)
{
    $products = $request->session()->get("products");
    $products[] = [
        'id'=>$id,
        'quantity' => $request->input('quantity'),
        'type' => $type,
    ];
    $request->session()->put('products', $products);

    return redirect()->route('cart.index');
}


    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }
}