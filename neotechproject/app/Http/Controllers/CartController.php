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
 
 foreach ($productsInSession as $product) {
     if ($product['type'] == 'part') {
         $partsInSession[] = $product;
     } else if ($product['type'] == 'computer'){
        $computersInSession[] = $product;
     }
 }

 if ($partsInSession) {
    $partIds = array_column($partsInSession, 'id');
    foreach ($partIds as $partId){
        $partsInCart[$partId]= Part::findMany($partIds);
        foreach ($partsInSession as $partInSession){
            if ($partInSession['id']==$partId){
            $quantity= $partInSession["quantity"];
            $partsInCart[$partId][0]["quantity"]=$quantity;
        }
        }
    }
    echo(json_encode($partsInCart));
    $total += Part::sumPricesByQuantities($partsInCart, $partsInSession);
} else if ($computersInSession) {
    $computerIds = array_column($computersInSession, 'id');
    foreach ($computerIds as $computerId){
        $computersInCart[$computerId]= Computer::findMany($computerId);
        foreach ($computersInSession as $computerInSession){
            if ($computerInSession['id']==$computerId){
            $quantity= $computerInSession["quantity"];
            $computersInCart[$computerId][0]["quantity"]=$quantity;
        }
        }
    }
    $total += Computer::sumPricesByQuantities($computersInCart, $computersInSession);
}
 echo("222222");
 $viewData = [];
 $viewData["title"] = "Cart - Online Store";
 $viewData["subtitle"] = "Shopping Cart";
 $viewData["total"] = $total;
 $viewData["computers"] = $computersInCart;
 $viewData["parts"] = $partsInCart;
 echo("333333");
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