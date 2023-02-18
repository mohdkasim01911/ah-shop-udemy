<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\admin\{wishlist,Coupan,Distric,shiping,AreaState};
use Carbon\Carbon;
use Auth;


class CheckoutController extends Controller
{
    public function checkoutStore(Request $request){
         
         $data = array();

         $data['shipping_name'] = $request->shipping_name;
         $data['shipping_email'] = $request->shipping_email;
         $data['shipping_phone'] = $request->shipping_phone;
         $data['shipping_postcode'] = $request->shipping_postcode;
         $data['division'] = $request->division;
         $data['district'] = $request->district;
         $data['state'] = $request->state;
         $data['notes'] = $request->notes;

         $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total() - Cart::tax() ;

         if($request->payment_type == 'stripe')
         {
            return view('front.payment.stripe',compact('data','cartQty','cartTotal','carts'));
         }elseif($request->payment_type == 'card'){
             return 'Card';
         }else{
             return 'cash';
         }
        
    }
}
