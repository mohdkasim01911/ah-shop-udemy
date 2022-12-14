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
        </div><!-- /.row -->
      <!--/div--><!-- /.sigin-in-->
   </div>
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include('front.front_include.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection