<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Item;
use App\Models\Order;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index(Request $request)
    {
        $total = 0;
        $productsInSession = $request->session()->get('products');
        $partsInCart = [];
        $partsInSession = [];
        $computersInCart = [];
        $computersInSession = [];

        if ($productsInSession) {
            foreach ($productsInSession as $product) {
                if ($product['type'] == 'part') {
                    $partsInSession[] = $product;
                } elseif ($product['type'] == 'computer') {
                    $computersInSession[] = $product;
                }
            }
        }

        if ($partsInSession) {
            $partIds = array_column($partsInSession, 'id');
            foreach ($partIds as $partId) {
                $partsInCart[$partId] = Part::findMany($partIds);
                foreach ($partsInSession as $partInSession) {
                    if ($partInSession['id'] == $partId) {
                        $quantity = $partInSession['quantity'];
                        $partsInCart[$partId][0]['quantity'] = $quantity;
                    }
                }
            }
            $total += Part::sumPricesByQuantities($partsInCart, $partsInSession);
        } if ($computersInSession) {
            $computerIds = array_column($computersInSession, 'id');
            foreach ($computerIds as $computerId) {
                $computersInCart[$computerId] = Computer::findMany($computerId);
                foreach ($computersInSession as $computerInSession) {
                    if ($computerInSession['id'] == $computerId) {
                        $quantity = $computerInSession['quantity'];
                        $computersInCart[$computerId][0]['quantity'] = $quantity;
                    }
                }
            }
            $total += Computer::sumPricesByQuantities($computersInCart, $computersInSession);
        }
        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['products'] = $productsInSession;
        $viewData['computers']=$computersInCart;
        $viewData['parts']=$partsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id, $type)
    {
        $products = $request->session()->get('products');
        $products[] = [
            'id' => $id,
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

       public function purchase(Request $request)
       {
           $productsInSession = $request->session()->get('products');
           $partsInCart = [];
           $partsInSession = [];
           $computersInCart = [];
           $computersInSession = [];
   
           if ($productsInSession) {
               $userId = Auth::user()->getId();
               $order = new Order();
               $order->setUserId($userId);
               $order->setTotal(0);
               $order->setPaid("No");
               $order->setDelivered("No");
               $order->save();
               $total = 0;
               if ($productsInSession) {
                foreach ($productsInSession as $product) {
                    if ($product['type'] == 'part') {
                        $partsInSession[] = $product;
                    } elseif ($product['type'] == 'computer') {
                        $computersInSession[] = $product;
                    }
                }
            }
    
            if ($partsInSession) {
                $partIds = array_column($partsInSession, 'id');
                foreach ($partIds as $partId) {
                    $partsInCart[$partId] = Part::findMany($partIds);
                    foreach ($partsInSession as $partInSession) {
                        if ($partInSession['id'] == $partId) {
                            $quantity = $partInSession['quantity'];
                            $partsInCart[$partId][0]['quantity'] = $quantity;
                        }
                    }
                }
                $total += Part::sumPricesByQuantities($partsInCart, $partsInSession);
            } elseif ($computersInSession) {
                $quantity=0;
                $computerIds = array_column($computersInSession, 'id');
                foreach ($computerIds as $computerId) {
                    $computersInCart[$computerId] = Computer::findMany($computerId);
                    foreach ($computersInSession as $computerInSession) {
                        if ($computerInSession['id'] == $computerId) {
                            $quantity = $computerInSession['quantity'];
                            $computersInCart[$computerId][0]['quantity'] = $quantity;
                        }
                    }
                }
                $total += Computer::sumPricesByQuantities($computersInCart, $computersInSession);
            }
               
               foreach ($partsInCart as $part) {
                    foreach ($computersInCart as $computer){
                   $quantity = $part[0]['quantity']+$computer[0]['quantity'];
                   $item = new Item();
                   $item->setQuantity($quantity);
                   $price=$part[0]['price']+$computer[0]['price'];
                   $item->setPrice($price);
                   $item->setPartId($part[0]['id']);
                   $item->setComputerId($computer[0]['id']);
                   $item->setOrderId($order->getId());
                   $item->save();
                   $total = $total + ($item->getPrice() * $quantity);
                }}
               $order->setTotal($total);
               $order->save();
               //$newBalance = Auth::user()->getBalance() - $total;
               //Auth::user()->setBalance($newBalance);
               //Auth::user()->save();

               $request->session()->forget('products');

               $viewData = [];
               $viewData['title'] = 'Purchase - Online Store';
               $viewData['subtitle'] = 'Purchase Status';
               $viewData['order'] = $order;

               return view('cart.purchase')->with('viewData', $viewData);
           } else {
               return redirect()->route('cart.index');
           }
       }
}
