<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\admin\wishlist;
use Carbon\Carbon;
use Auth;

class WishlistController extends Controller
{
    public function view_wishlist()
    {

        return view('front.wishlist.view_wishlist');
    }

    public function getWishlistData()
    {
        $wishlist = wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function wishlistRemove($id){
      
      wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
      return response()->json(['success' => 'SuccessFully remove product on your card']);

    }
}
