<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function mycart(){
        return view('front.wishlist.view_mycart');
    }

    public function getCartProduct(){


        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $tax = Cart::tax();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal - $tax),
        ));
    }

    public function cartRemove($rowId)
    {
       Cart::remove($rowId);
       return response()->json(['success' => 'SuccessFully Remove on your card']);
    }

    public function cartIncrement($rowId)
    {
       $row = Cart::get($rowId);
       Cart::update($rowId,$row->qty + 1);
        return response()->json('increment');
    }

    public function cartDecrement($rowId)
    {
       $row = Cart::get($rowId);
       Cart::update($rowId,$row->qty - 1);
        return response()->json('decrement');
    }
}
