@extends('front.font_layout')
@section('content')

 <div class="body-content">
     <div class="container">
         <div class="row">
              @include('front.common.usersidebar');
              <div class="col-md-2">
                  
              </div>
              <div class="col-md-6">
                   <div class="card">
                       <h3 class="text-center">
                           <span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Welcome To AH Shop</h3>
                   </div>
              </div>
         </div>
     </div>
 </div>


@endsection