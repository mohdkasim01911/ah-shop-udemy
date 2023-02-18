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
                           <span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Update Your Profile</h3>
                   </div>

                   <div class="card-body">
                       <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="form-group">
                              <label class="info-title">Name</label>
                              <input type="text" name="name" class="form-control" value="{{$user->name}}">
                           </div>

                            <div class="form-group">
                              <label class="info-title">Email</label>
                              <input type="email" name="email" class="form-control" value="{{$user->email}}">
                           </div>

                            <div class="form-group">
                              <label class="info-title">Phone</label>
                              <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                           </div>

                            <div class="form-group">
                              <label class="info-title">Image</label>
                              <input type="file" name="image" class="form-control">
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