@extends('front.font_layout')
@section('content')

@section('title')
  Wish List
@endsection

<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>My Cart</li>
         </ul>
      </div><!-- /.breadcrumb-inner -->
   </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
   <div class="container">
      <div class="my-wishlist-page">
        <div class="row ">
         <!--div class="shopping-cart"-->
            <div class="shopping-cart-table ">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="cart-romove item">Image</th>
                           <th class="cart-description item">Product Name</th>
                           <th class="cart-product-name item">color</th>
                           <th class="cart-edit item">size</th>
                           <th class="cart-qty item">Quantity</th>
                           <th class="cart-sub-total item">Subtotal</th>
                           <th class="cart-total last-item">Remove</th>
                        </tr>
                     </thead><!-- /thead -->
                     <tbody id="cartpage">
                     
                     </tbody>
                  </table>
               </div>
            </div> 

          <div class="col-md-4 col-sm-12 estimate-ship-tax">
          </div>

      
         <div class="col-md-4 col-sm-12 estimate-ship-tax">
           
           @if(Session::has('coupan'))

           @else

               
            <table class="table" id="coupanField">
               <thead>
                  <tr>
                     <th>
                        <span class="estimate-title">Discount Code</span>
                        <p>Enter your coupon code if you have one..</p>
                     </th>
                  </tr>
               </thead>
               <tbody>
                     <tr>
                        <td>
                           <div class="form-group">
                              <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
                           </div>
                           <div class="clearfix pull-right">
                              <button type="submit" class="btn-upper btn btn-primary" onclick="AddCoupan()">APPLY COUPON</button>
                           </div>
                        </td>
                     </tr>
               </tbody><!-- /tbody -->
            </table><!-- /table -->

           @endif
         </div><!-- /.estimate-ship-tax -->

         <div class="col-md-4 col-sm-12 cart-shopping-total">
            <table class="table">
               <thead  id="coupanCalFeild">
                  
               </thead><!-- /thead -->
               <tbody>
                     <tr>
                        <td>
                           <div class="cart-checkout-btn pull-right">
                              <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                           </div>
                        </td>
                     </tr>
               </tbody><!-- /tbody -->
            </table><!-- /table -->
         </div><!-- /.cart-shopping-total -->



        </div><!-- /.row -->
      <!--/div--><!-- /.sigin-in-->
   </div>
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include('front.front_include.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection