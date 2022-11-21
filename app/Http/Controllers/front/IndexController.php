<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
   public function index()
   {
     return view('front.index');
   }

   public function destroy()
   {
     Auth::logout();
     return redirect()->route('login');
   }

   public function profile()
   {
      $user = user::find(Auth::user()->id);
     return view('front.profile',compact('user'));
   }

   public function update_profile(Request $request)
   {
         $data = user::find(Auth::user()->id);

       $data->name = $request->name;
       $data->email = $request->email;
       $data->phone = $request->phone;

       if($request->file('image'))
       {
         $file = $request->file('image');
         @unlink(public_path('upload/user_image/'.$data->profile_photo_path));
         $filename = date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/user_image'),$filename);
         $data['profile_photo_path'] = $filename;
       }

       $data->save();

       $notification = array(
 
          'message' => 'User Profile Updated',
          'alert-type' => 'success'
 

       );

       return redirect()->route('dashboard')->with($notification);
   }

   public function change_password()
   {
       return view('front.change_password');
   }

    public function update_password(Request $request)
    {



        // $validateData = $request->validate([
            
        //     'old_pass' => 'required',
        //     'password' => 'required|confirmed'

        // ]);

         $haspassword = user::find(Auth::user()->id)->password;

         if(Hash::check($request->old_pass,$haspassword))
         {
            
            $user = user::find(Auth::user()->id);

            $user->password = Hash::make($request->new_pass);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
         }else{
            return redirect()->back();
         }
    }
}
