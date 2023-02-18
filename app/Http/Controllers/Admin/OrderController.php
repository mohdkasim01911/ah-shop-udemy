<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\{Order,OrderItem};
use Carbon\Carbon;
use Auth;

class OrderController extends Controller
{
    public function penddingOrder(){
       $orders = Order::where('status','Pendding')->orderBy('id','DESC')->get();
        
       return view('admin.order.pendding',compact('orders'));

    }

     public function penddingOrderDetails($id){
    
      $orders = Order::with('division','destrict','state','user')->where('user_id',Auth::id())->where('id',$id)->first();
      $ordersItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

      return view('admin.order.pendding_details',compact('orders','ordersItem'));

    }

    public function confirmOrder(){
       $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        
       return view('admin.order.confirm',compact('orders'));

    }

     public function proccessingOrder(){
       $orders = Order::where('status','proccessing')->orderBy('id','DESC')->get();
        
       return view('admin.order.processing',compact('orders'));

    }


     public function pickedOrder(){
       $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        
       return view('admin.order.picked',compact('orders'));

    }

    public function shippedOrder(){
       $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        
       return view('admin.order.shipped',compact('orders'));

    }

    public function deliveredOrder(){
       $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        
       return view('admin.order.delivered',compact('orders'));

    }

    public function cancelOrder(){
       $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        
       return view('admin.order.cancel',compact('orders'));

    }


    public function penddingToconfirm($id){
       $orders = Order::findOrFail($id)->update(['status' => 'confirm']);

        $notification = [
         
           'message' => 'Product Confirm Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('pendding.order')->with($notification);

    }

    public function confirmToproccessing($id){
       $orders = Order::findOrFail($id)->update(['status' => 'proccessing']);

        $notification = [
         
           'message' => 'Product Proccessing Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('confirm.order')->with($notification);

    }

    public function proccessingTopicked($id){
       $orders = Order::findOrFail($id)->update(['status' => 'picked']);

        $notification = [
         
           'message' => 'Product Picked Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('proccessing.order')->with($notification);

    }

     public function pickedToshipped($id){
       $orders = Order::findOrFail($id)->update(['status' => 'shipped']);

        $notification = [
         
           'message' => 'Product Shipped Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('picked.order')->with($notification);

    }

    public function shippedTodelivered($id){
       $orders = Order::findOrFail($id)->update(['status' => 'delivered']);

        $notification = [
         
           'message' => 'Product Delivered Successfully',
           'alert-type' => 'success'
        ];

        return redirect()->route('shipped.order')->with($notification);

    }


    

}
