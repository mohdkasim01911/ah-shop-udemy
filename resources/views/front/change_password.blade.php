@extends('front.font_layout')
@section('content')

<?php
   $user = DB::table('users')->where('id',Auth::user()->id)->first();
?>

 <div class="body-content">
     <div class="container">
         <div class="row">
             @include('front.common.usersidebar');
              <div class="col-md-2">
                  
              </div>
              <div class="col-md-6">
                   <div class="card">
                       <h3 class="text-center">
                           <span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong>Change Password</h3>
                   </div>

                   <div class="card-body">
                       <form action="{{route('user.update.password')}}" method="post">
                         @csrf
                           <div class="form-group">
                              <label class="info-title">Old Password</label>
                              <input type="password" name="old_pass" class="form-control">
                           </div>

                            <div class="form-group">
                              <label class="info-title">New Password</label>
                              <input type="password" id="new_pass" name="new_pass" class="form-control">
                           </div>

                            <div class="form-group">
                              <label class="info-title">Confirm Password</label>
                              <input type="password" id="c_pass" name="c_pass" class="form-control">
                           </div>

                           <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-primary" value="Update">
                           </div>

                       </form>
                   </div>
              </div>
         </div>
     </div>
 </div>


@endsection