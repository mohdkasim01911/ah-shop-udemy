@extends('front.font_layout')
@section('content')

@section('title')
  Strip Payment
@endsection

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

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
            <div class="col-md-6">
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
</div>
<!-- checkout-progress-sidebar -->    
<div class="col-md-6">
<div class="checkout-progress-sidebar ">
   <div class="panel-group">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="unicase-checkout-title">Select Payment Method</h4>
         </div>
        <form action="{{route('stripe.order')}}" method="post" id="payment-form">
         @csrf
           <div class="form-row">
             <label for="card-element">

       <input type="hidden" name="name" value="{{$data['shipping_name']}}">
       <input type="hidden" name="email" value="{{$data['shipping_email']}}">
       <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
       <input type="hidden" name="postcode" value="{{$data['shipping_postcode']}}">
       <input type="hidden" name="devision_id" value="{{$data['division']}}">
       <input type="hidden" name="district_id" value="{{$data['district']}}">
       <input type="hidden" name="state_id" value="{{$data['state']}}">
       <input type="hidden" name="notes" value="{{$data['notes']}}">

             </label>
             <div id="card-element">
               <!-- A Stripe Element will be inserted here. -->
             </div>

             <!-- Used to display Element errors. -->
             <div id="card-errors" role="alert"></div>
           </div>

           <button>Submit Payment</button>
         </form>
         
      </div>
   </div>
</div>   

</div>
    </div>
         </div><!-- /.row -->
      </div><!-- /.checkout-box -->
      <!-- =========== BRANDS CAROUSEL ====================== -->
       @include('front.front_include.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->


<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51MYoqqKQLGLCSqPSxJUaSpAbCxW36hi57k541TRh4eSywKnqBe7RYp8EBIZNYVYzfFaFTtTpgiRq0Zuty1C1FBni002eYDN9xF');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>

@endsection