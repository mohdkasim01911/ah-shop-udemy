<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\admin\{wishlist,Coupan};

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
       
        if(Session::has('coupan')){
            Session::forget('coupan');
        }

        $catrTotal = Cart::total();

       return response()->json(['success' => 'SuccessFully Remove on your card','cartQty'=>$catrTotal]);
    }

    public function cartIncrement($rowId)
    {
       $row = Cart::get($rowId);
       Cart::update($rowId,$row->qty + 1);

       $cart_total = Cart::total() - Cart::tax();

         if(Session::has('coupan')){

            $coupan_name = Session::get('coupan')['copan_name'];

            $coupan = Coupan::where('coupan_name',$coupan_name)->first();

              Session::put('coupan',[
                    'copan_name' => $coupan->coupan_name,
                    'coupan_discount' => $coupan->coupan_discount,
                    'discount_amount' => round($cart_total * $coupan->coupan_discount/100),
                    'total_amount' => round($cart_total - $cart_total * $coupan->coupan_discount/100),

                ]);

       }

        return response()->json('increment');
    }

    public function cartDecrement($rowId)
    {
       $row = Cart::get($rowId);
       Cart::update($rowId,$row->qty - 1);

       $cart_total = Cart::total() - Cart::tax();
          

        if(Session::has('coupan')){

            $coupan_name = Session::get('coupan')['copan_name'];
            
            $coupan = Coupan::where('coupan_name',$coupan_name)->first();

              Session::put('coupan',[
                    'copan_name' => $coupan->coupan_name,
                    'coupan_discount' => $coupan->coupan_discount,
                    'discount_amount' => round($cart_total * $coupan->coupan_discount/100),
                    'total_amount' => round($cart_total - $cart_total * $coupan->coupan_discount/100),

                ]);

       }

        return response()->json('decrement');
    }
}
