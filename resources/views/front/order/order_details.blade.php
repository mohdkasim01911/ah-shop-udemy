@extends('front.font_layout')
@section('content')

 <div class="body-content">
     <div class="container">
         <div class="row">
              @include('front.common.usersidebar');
            
              <div class="col-md-5">
                  <div class="card">
                     <div class="card-header">
                        <h4>Shipping Details</h4>  
                     </div>
                     <hr>
                     <div class="card-body" style="background-color:#E9EBEC">
                        <table class="table">
                           <tr>
                              <th>Shipping Name : </th>
                              <th>{{$orders->user->name}}</th>
                           </tr>
                           <tr>
                              <th>Shipping Phone : </th>
                              <th>{{$orders->phone}}</th>
                           </tr>
                           <tr>
                              <th>Shipping Email : </th>
                              <th>{{$orders->email}}</th>
                           </tr>
                           <tr>
                              <th>Devision : </th>
                              <th>{{$orders->division->division_name}}</th>
                           </tr>
                           <tr>
                              <th>District : </th>
                              <th>{{$orders->destrict->distric_name}}</th>
                           </tr>
                           <tr>
                              <th>State  : </th>
                              <th>{{$orders->state->state_name}}</th>
                           </tr>

                           <tr>
                              <th>Post Code  : </th>
                              <th>{{$orders->post_code}}</th>
                           </tr>

                           <tr>
                              <th>Order Date  : </th>
                              <th>{{$orders->order_date}}</th>
                           </tr>
                        </table>
                     </div>
                  </div>
              </div>

              <div class="col-md-5">
                  <div class="card">
                     <div class="card-header">
                        <h4>Order Details<span class="text-danger">Invoice {{$orders->invoice_number}}</span> </h4> 
                     </div>
                     <hr>
                     <div class="card-body" style="background-color:#E9EBEC">
                        <table class="table">
                           <tr>
                              <th> Name : </th>
                              <th>{{$orders->user->name}}</th>
                           </tr>
                           <tr>
                              <th> Phone : </th>
                              <th>{{$orders->user->phone}}</th>
                           </tr>
                           <tr>
                              <th>Payment Type : </th>
                              <th>{{$orders->payment_method}}</th>
                           </tr>
                           <tr>
                              <th>Tranx ID : </th>
                              <th>{{$orders->transaction_id}}</th>
                           </tr>
                           <tr>
                              <th>Invoice : </th>
                              <th class="text-danger">{{$orders->invoice_number}}</th>
                           </tr>
                           <tr>
                              <th>Order Total  : </th>
                              <th>{{$orders->amont}}</th>
                           </tr>

                           <tr>
                              <th>Order  : </th>
                              <th>{{$orders->post_code}}</th>
                           </tr>

                           <tr>
                              <th>Order Date  : </th>
                              <th><span class="badge badge-pill badge-warning" style="background: #418D89">{{$orders->status}}</span></th>
                           </tr>
                        </table>
                     </div>
                  </div>
              </div>


              <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background-color:#e2e2e2;">
                              <td class="col-md-1">
                                  <label for="">Image</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Product Name</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">Product Code</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">Color</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Size</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Quantity</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Price</label>
                              </td>
                            </tr>
                         @foreach($ordersItem as $item)
                            <tr>
                              <td class="col-md-1">
                                  <label for=""><img src="{{asset($item->product->product_thambnail)}}" width="50" height="50"></label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">{{$item->product->product_name_en}}</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">{{$item->product->product_code}}</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">{{$item->color}}</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">{{$item->size}}</label>
                              </td>

                               <td class="col-md-1">
                                  <label for="">{{$item->qty}}</label>
                              </td>

                              <td class="col-md-1">
                                  <label for="">${{$item->price}} ({{$item->price * $item->qty}})</label>
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