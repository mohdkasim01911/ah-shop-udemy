@extends('front.font_layout')
@section('content')

<?php
   $user = DB::table('users')->where('id',Auth::user()->id)->first();
?>

 <div class="body-content">
     <div class="container">
         <div class="row">
              <div class="col-md-2"><br/>
                  <img class="card-img-top" src="{{(!empty($user->profile_photo_path))?url('upload/user_image/'.$user->profile_photo_path):url('upload/admin_image/no-image-available.webp')}}" style="border-radius:50%;width:100px;height:100px;">
                  <br/><br/>

                <ul>
                   <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                   <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                   <a href="{{url('user/change/password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                   <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
              </div>
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