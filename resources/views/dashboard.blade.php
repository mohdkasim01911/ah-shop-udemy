@extends('front.font_layout')
@section('content')

 <div class="body-content">
     <div class="container">
         <div class="row">
              <div class="col-md-2"><br/>
                  <img class="card-img-top" src="{{(!empty($user->profile_photo_path))?url('upload/user_image/'.$user->profile_photo_path):url('upload/user_image/no-image-available.webp')}}" style="border-radius:50%;width:100px;height:100px;">
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
                           <span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Welcome To AH Shop</h3>
                   </div>
              </div>
         </div>
     </div>
 </div>


@endsection