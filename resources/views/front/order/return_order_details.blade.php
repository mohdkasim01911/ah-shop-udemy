@extends('front.font_layout')
@section('content')

 <div class="body-content">
     <div class="container">
         <div class="row">
              @include('front.common.usersidebar');
            
              <div class="col-md-2">
              </div>

              <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background-color:#e2e2e2;">
                              <td class="col-md-1">
                                  <label for="">Date</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Total</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">Payment</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">Invoice</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Order</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Action</label>
                              </td>
                            </tr>
                         @foreach($orders as $order)
                            <tr>
                              <td class="col-md-1">
                                  <label for="">{{$order->order_date}}</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">${{$order->amont}}</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">{{$order->payment_method}}</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">{{$order->invoice_number}}</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">
                                    <span class="badge badge-pill badge-warning" style="background: #418D89">{{$order->status}}</span></label>
                                    <label for="">
                                    <span class="badge badge-pill badge-danger" style="background: red">Return Requested</span></label>
                              </td>
                              <td class="col-md-1">
                                  <label for=""><a href="{{url('user/order-details/'.$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a></label>

                                  <label for=""><a target="_blank" href="{{url('user/invoice-download/'.$order->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color:white"></i> Invoice</a></label>
                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
              
         </div>
     </div>
 </div>


@endsection