<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\{Order,OrderItem};
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Carbon\Carbon;
use Auth;

class StripeController extends Controller
{
    public function stripeOrder(Request $request){

        if(Session::has('coupan')){
            $total_amount = Session::get('coupan')['total_amount'];
        }else{
            $total_amount = round(Cart::total() - Cart::tax());
        }


        \Stripe\Stripe::setApiKey('sk_test_51MYoqqKQLGLCSqPSTlzDuiOnszVrlRW2SszZSxZER9lktm9pa32yGnHN9rjLkQjCbP8jWToTIC58hl298y9OXAxc000PxSWl7T');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'AH Shop',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        $order_id = Order::insertGetId([
          
             'user_id' => Auth::id(),
             'division_id' => $request->devision_id,
             'distric_id' => $request->district_id,
             'state_id' => $request->state_id,
             'name' => $request->name,
             'email' => $request->email,
             'phone' => $request->phone,
             'post_code' => $request->postcode,
             'notes' => $request->notes,

             'payment_type' => 'Stripe',
             'payment_method' => 'Stripe',
             'payment_type' => $charge->payment_method,
             'transaction_id' => $charge->balance_transaction,
             'currency' => $charge->currency,
             'amont' => $total_amount,
             'order_number' => $charge->metadata->order_id,

             'invoice_number' => 'EOS'.mt_rand(10000000,99999999),
             'order_date' => Carbon::now()->format('d F Y'),
             'order_month' => Carbon::now()->format('F'),
             'order_year' => Carbon::now()->format('Y'),
             'status' => 'pendding',
             'created_at' => Carbon::now(),
        ]);

        //start send Mail
          $invoice = Order::findOrFail($order_id);
              $data = [
               'invoice_no' => $invoice->invoice_number,
               'amount' => $total_amount,
               'name' => $request->name,
               'email' => $request->email,
              ];

          Mail::to($request->email)->send(new OrderMail($data));
            //end send Mail

        $carts = Cart::content();

        foreach($carts as $cart){
            OrderItem::insert([
              'order_id' => $order_id,
              'product_id' => $cart->id,
              'color' => $cart->options->color,
              'size' => $cart->options->size,
              'qty' => $cart->qty,
              'price' => $cart->price,
              'created_at' => Carbon::now(),

            ]);
        }


        if(Session::has('coupan')){
            Session::forget('coupan');
        }

        Cart::destroy();


        $notification = [
         
           'message' => 'Your Order Placed SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('dashboard')->with($notification);     
    }
}
