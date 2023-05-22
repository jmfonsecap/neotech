<?php
namespace App\Http\Controllers;
use App\Models\Part;
use App\Models\Computer;
use Illuminate\Http\Request;
class CartController extends Controller
{
 public function index(Request $request)
 {
 $total = 0;
 $productsInCart = [];
 $productsInSession = $request->session()->get("products");
 $partsInCart = [];
 $partsInSession = [];
 $computersInCart=[];
 $computersInSession=[];
 echo(json_encode($productsInSession));
 foreach ($productsInSession as $product) {
     if ($product['type'] == 'part') {
         $partsInSession[] = $product;
     } else if ($product['type'] == 'computer'){
        $computersInSession[] = $product;
     }
 }
 echo(" Partes: ");
 echo(json_encode($partsInCart));
 echo(" Comps: ");
 echo(json_encode($computersInCart));

 if ($partsInSession) {
   $partsInCart = Part::findMany(array_keys($partsInSession));
   $total += Part::sumPricesByQuantities($partsInCart, $partsInSession);
   } else if($computersInSession){
    $computersInCart = Computer::findMany(array_keys($computersInSession));
    $total += Computer::sumPricesByQuantities($computersInCart, $computersInSession);
   }
   echo(' Total: ');
   echo(json_encode($total));
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