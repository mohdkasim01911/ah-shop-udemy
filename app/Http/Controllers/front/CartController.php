<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\admin\{wishlist,Coupan,Distric,shiping,AreaState};
use Carbon\Carbon;
use Auth;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function AddToCard(Request $request, $id)
    {
       
        if(Session::has('coupan')){
            Session::forget('coupan');
        }

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

    public function CoupanApply(Request $request){

        $coupan = Coupan::where('coupan_name',$request->coupan_name)->where('coupan_validety','>=',Carbon::now()->format('Y-m-d'))->first();

        $cart_total = Cart::total() - Cart::tax();

        if($coupan){
            
            Session::put('coupan',[
                'copan_name' => $coupan->coupan_name,
                'coupan_discount' => $coupan->coupan_discount,
                'discount_amount' => round($cart_total * $coupan->coupan_discount/100),
                'total_amount' => round($cart_total - $cart_total * $coupan->coupan_discount/100),

            ]);
            return response()->json(array(
                
                'success' => 'Coupan Applied SuccessFully'
 
            ));

        }else{
           return response()->json(['error'=>'Invalid Coupan']);
        }
    
    }

    public function coupanCalculation(){

       if(Session::has('coupan')){

          return response()->json(array(
 
               'subtotal' => Cart::total() - Cart::tax(),
               'coupan_name' => session()->get('coupan')['copan_name'],
               'coupan_discount' => session()->get('coupan')['coupan_discount'],
               'discount_amount' => session()->get('coupan')['discount_amount'],
               'total_amount' => session()->get('coupan')['total_amount'], 
          ));

       }else{
        
         return response()->json(array(
           
            'total' =>  Cart::total() - Cart::tax(),

          ));


       }    


    }

    public function coupanRemove(){
        Session::forget('coupan');
        return response()->json(['success' => 'Coupan Remove SuccessFully']);
    }

    public function checkoutProcess(){

      if(Auth::check()){

        if(Cart::total() > 0){

            $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total() - Cart::tax() ;

        $division = shiping::all();
        $Distric = Distric::all();
        $AreaState = AreaState::all();

            return view('front.checkout.checkout',compact('carts','cartQty','cartTotal','division','Distric','AreaState'));

        }else{

           $notification = array(
              'message' => 'Need To Buy Atleast One Product',
              'alert-type' => 'error'
           );
           return redirect()->to('/')->with($notification);

        }

      }else{
           $notification = array(
          'message' => 'You Need To Login First',
          'alert-type' => 'error'
       );
       return redirect()->route('login')->with($notification);

      }

    }

   

}
