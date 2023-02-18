@extends('front.font_layout')
@section('content')

@section('title')
  Checkout
@endsection

<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>Checkout</li>
         </ul>
      </div><!-- /.breadcrumb-inner -->
   </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
   <div class="container">
      <div class="checkout-box ">
         <div class="row">
            <div class="col-md-8">
               <div class="panel-group checkout-steps" id="accordion">
                  <!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

   <div id="collapseOne" class="panel-collapse collapse in">

      <!-- panel-body  -->
       <div class="panel-body">
         <div class="row">    

            <!-- guest-login -->       
            <div class="col-md-6 col-sm-6 already-registered-login">
               <h4 class="checkout-subtitle"><strong>Shipping Address</strong></h4>
               <form class="register-form" method="POST" action="{{ route('checkout.store') }}">
                  @csrf
                  <div class="form-group">
                   <label class="info-title" for="shipping_name"><b>Shipping Name</b><span>*</span></label>
                   <input type="text" name="shipping_name" class="form-control" id="shipping_name" placeholder="Name" value="{{Auth::user()->name}}">
                 </div>
                 <div class="form-group">
                   <label class="info-title" for="shipping_email"><b>Email</b><span>*</span></label>
                   <input type="email" name="shipping_email" class="form-control" id="shipping_email" placeholder="Name" value="{{Auth::user()->email}}">
                 </div>
                 <div class="form-group">
                   <label class="info-title" for="shipping_phone"><b>Phone</b><span>*</span></label>
                   <input type="text" name="shipping_phone" class="form-control" id="shipping_phone" placeholder="Name" value="{{Auth::user()->phone}}">
                 </div>
                 <div class="form-group">
                   <label class="info-title" for="shipping_postcode"><b>Post Code</b><span>*</span></label>
                   <input type="text" name="shipping_postcode" class="form-control" id="shipping_postcode" placeholder="Post Code">
                 </div>
            </div>
            <!-- guest-login -->

            <!-- already-registered-login -->
            <div class="col-md-6 col-sm-6 already-registered-login">
                  <div class="form-group">
                   <label class="info-title" for="division"><b>Division Select</b><span>*</span></label>
                   <select class="form-control" name="division" id="division">
                      <option value="">Select Division</option>
                      @foreach($division as $item)
                      <option value="{{$item->id}}">{{$item->division_name}}</option>
                      @endforeach
                   </select>
                 </div>
                  <div class="form-group">
                   <label class="info-title" for="district"><b>District Select</b><span>*</span></label>
                   <select class="form-control" name="district" id="district">
                      <option value="">Select District</option>
                     @foreach($Distric as $item)
                      <option value="{{$item->id}}">{{$item->distric_name}}</option>
                     @endforeach
                   </select>
                 </div>
                 <div class="form-group">
                   <label class="info-title" for="state">State Select<span>*</span></label>
                   <select class="form-control" name="state" id="state">
                      <option value="">State select</option>
                     @foreach($AreaState as $item)
                      <option value="{{$item->id}}">{{$item->state_name}}</option>
                     @endforeach
                   </select>
                 </div>
                  <div class="form-group">
                   <label class="info-title" for="notes"><b>Notes</b><span>*</span></label>
                   <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes" id="notes"></textarea>
                 </div>
            </div>   
            <!-- already-registered-login -->      
       
         </div>         
      </div>
      <!-- panel-body  -->

   </div><!-- row -->
</div>
<!-- checkout-step-01  -->
                  
               </div><!-- /.checkout-steps -->
            </div>
            <div class="col-md-4">
               <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
   <div class="panel-group">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
          </div>
          <div class="">
            <ul class="nav nav-checkout-progress list-unstyled">
             
              @foreach($carts as $item)
               <li>
                  <strong>Image:</strong>              
                  <img src="{{asset($item->options->image)}}" style="width:50px;height:50px">
               </li>
               <li>
                  <strong>Qty:</strong>
                  ({{$item->qty}})

                  <strong>Color:</strong>
                  {{$item->options->color}}

                  <strong>Size:</strong>
                  {{$item->options->size}}
               </li>

              @endforeach
              <hr>
               <li>
                    
                   @if(Session::has('coupan'))

                   <strong>Sub Total: ${{$cartTotal}}</strong>
                   <hr>
                   <strong>Coupan Name:</strong> {{session()->get('coupan')['copan_name']}}
                   ({{session()->get('coupan')['discount_amount']}}) %
                   <hr>
                   <strong>Grand Total:</strong> {{session()->get('coupan')['total_amount']}}

                   @else

                   <strong>Sub Total:</strong> ${{$cartTotal}}
                    <hr>
                   <strong>Grand Total:</strong> ${{$cartTotal}}

                   @endif

                   

               </li>
            </ul>    
         </div>
      </div>
   </div>
</div> 
<!-- checkout-progress-sidebar -->    

<div class="checkout-progress-sidebar ">
   <div class="panel-group">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="unicase-checkout-title">Select Payment Method</h4>
         </div>
         <div class="row">
            <div class="col-md-4">
             <label class="info-title" for="shipping_email"><b>Stripe</b></label>
             <input type="radio" name="payment_type" id="payment_type" placeholder="Name" value="stripe">
             <img src="{{asset('front/assets/images/payments/4.png')}}">
           </div>
           <div class="col-md-4">
             <label class="info-title" for="shipping_email"><b>Card</b></label>
             <input type="radio" name="payment_type" id="payment_type" placeholder="Name" value="card">
             <img src="{{asset('front/assets/images/payments/3.png')}}">
           </div>
           <div class="col-md-4">
             <label class="info-title" for="shipping_email"><b>Cash</b></label>
             <input type="radio" name="payment_type" id="payment_type" placeholder="Name" value="cash">
             <img src="{{asset('front/assets/images/payments/5.png')}}">
           </div>
        </div>
        <hr>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
      </div>
   </div>
</div>   

</div>
    </form>
    </div>
         </div><!-- /.row -->
      </div><!-- /.checkout-box -->
      <!-- =========== BRANDS CAROUSEL ====================== -->
       @include('front.front_include.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection