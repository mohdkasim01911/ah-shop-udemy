@php
   $user = App\Models\user::find(Auth::user()->id);
@endphp

<div class="col-md-2"><br/>
   <img class="card-img-top" src="{{(!empty($user->profile_photo_path))?url('upload/user_image/'.$user->profile_photo_path):url('upload/user_image/no-image-available.webp')}}" style="border-radius:50%;width:100px;height:100px;">
   <br/><br/>

 <ul>
    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
    <a href="{{url('user/change/password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
    <a href="{{route('my.orders')}}" class="btn btn-primary btn-sm btn-block">My Orders</a>
    <a href="{{route('retun.orders.list')}}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
    <a href="{{route('cancel.orders.list')}}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
 </ul>
</div>