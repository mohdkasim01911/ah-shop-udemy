<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\admin\wishlist;
use Carbon\Carbon;
use Auth;

class CartController extends Controller
{
    function AddToCard(Request $request, $id)
    {
      $product = Product::findOrFail($id);

      // echo "<pre>";
      // print_r($product);
      // exit();

      if($product->product_discont_price == null)
      {

         Cart::add([
            'id' => $id, 
            'name' => $request->product_name, 
            'qty' => $request->quantity, 
            'price' => $product->product_selling_price, 
            'weight' => 1, 
            'options' => [
                'image' => $product->product_thambnail,
                'color' => $request->color,
                'size' =>  $request->size,

            ],
        ]);

         return response()->json(['success' => 'SuccessFully Added on your card']);
    }else{
        Cart::add([
            'id' => $id, 
            'name' => $request->product_name, 
            'qty' => $request->quantity, 
            'price' => $product->product_discont_price, 
            'weight' => 1, 
            'options' => [
                'image' => $product->product_thambnail,
                'color' => $request->color,
                'size' =>  $request->size,

            ],
        ]);
        return response()->json(['success' => 'SuccessFully Added on your card']);
    }

      
    }

    public function Addminicard(){
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

    public function RemoveMiniCart($rowId)
    {
       Cart::remove($rowId);
       return response()->json(['success' => 'SuccessFully Remove on your card']);
    }

    public function addToWishlist($product_id)
    {
         
         if(Auth::check())
         {
              
              $exists = wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

              if(!$exists){

                wishlist::insert([
                  
                  'user_id' => Auth::id(),
                  'product_id' => $product_id,
                  'created_at' => Carbon::now(),

                ]);

                return response()->json(['success'=>'Product Add To WishList']);

              }else{
                 return response()->json(['error'=>'Product All Ready Exist in WishList']);
              }
         }else{
             return response()->json(['error'=>'First Login Your Account']);
         }

    }
}
