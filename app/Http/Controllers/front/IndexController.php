<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\user;
use App\Models\admin\Category;
use App\Models\admin\Slider;
use App\Models\admin\Product;
use App\Models\admin\multiimage;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
   public function index()
   {
     $sliders = Slider::where('status',1)->orderBy('id','desc')->limit(3)->get();
     $categorys = Category::orderBy('cat_name_en','ASC')->get();
     $products  = Product::orderBy('id','DESC')->limit(6)->get();
     $feature  = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
     $hot_deals  = Product::where('hot_deals',1)->where('product_discont_price','!=',NUll)->orderBy('id','DESC')->limit(6)->get();
     $special_offer  = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
     $special_deals  = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();
     return view('front.index',compact('categorys','sliders','products','feature','hot_deals','special_offer','special_deals'));
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

    public function details($id,$slug)
    {
       $product = Product::findOrFail($id);
       $multimg = multiimage::where('product_id',$id)->get();
       return view('front.detail',compact('product','multimg'));
    }

    public function TagWiseProduct($tag)
    {
        
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','DESC')->paginate(1);
        $categorys = Category::orderBy('cat_name_en','ASC')->get();
       return view('front.tags.tags_view',compact('products','categorys'));
    }

    public function productviewajax($id){
      
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',',  $color);
 
        $size = $product->product_size_en;
        $product_size = explode(',',  $size);

        return response()->Json(array(
          'product' => $product,
          'color' => $product_color,
          'size' => $product_size,
        ));


    }
}

