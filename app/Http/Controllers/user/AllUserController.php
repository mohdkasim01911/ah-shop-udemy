<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\{Order,OrderItem};
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Mail\OrderMail;
use Carbon\Carbon;
use Auth;
use PDF;

class AllUserController extends Controller
{
    public function MyOrder(){
    
      $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();

      return view('front.order.orders_view',compact('orders'));

    }

    public function OrderDetails($id){
    
      $orders = Order::with('division','destrict','state','user')->where('user_id',Auth::id())->where('id',$id)->first();
      $ordersItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

      return view('front.order.order_details',compact('orders','ordersItem'));

    }

    public function invoiceDownload($id){
    
      $orders = Order::with('division','destrict','state','user')->where('user_id',Auth::id())->where('id',$id)->first();
      $ordersItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

      // return view('front.order.invoice_download',compact('orders','ordersItem'));

      $pdf = PDF::loadView('front.order.invoice_download',compact('orders','ordersItem'))->setPaper('a4')->setOptions([
           'tempDir' => public_path(), 
           'chroot' => public_path(),
        ]);
    return $pdf->download('invoice.pdf');

    }


    public function returnOrder(Request $request, $id){

       $orders = Order::findOrFail($id)->update([
             'return_date' => Carbon::now()->format('d F Y'),
             'return_reasion' => $request->return_reason,
         ]);

        $notification = [
         
           'message' => 'Return Request Send Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('my.orders')->with($notification);

    }

    public function returnOrderList(){

      $orders = Order::where('user_id',Auth::id())->where('return_reasion','!=',null)->get();

      return view('front.order.return_order_details',compact('orders'));

    }
}
