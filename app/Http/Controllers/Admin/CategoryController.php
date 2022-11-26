<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class CategoryController extends Controller
{
   public function index()
   {
      $categorys = Category::all();
      return view('admin.category.category',compact('categorys'));
   }

   public function add()
   {
      return view('admin.category.add');
   }

   public function store(Request $request)
   {
       $request->validate([
                 'bne' =>'required',
                 'bnh' =>'required',
                 'icon' =>'required',
           ],[
            'bne' => 'Category English Name is Required',
            'bnh' => 'Category Hindi Name is Required',
            'icon' => 'Icon Name is Required',
           ]);

        Category::insert([
         'cat_name_hin' => $request->bnh,
         'cat_name_en' => $request->bne,
         'cat_slug_en' => strtolower(str_replace(' ','-',$request->bne)), 
         'cat_slug_hin' => str_replace(' ','-',$request->bnh),
         'cat_icon' => $request->icon,        
        ]);

        $notification = [
         
           'message' => 'Category Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('category.list')->with($notification);
   }

   public function edit_category($id){
      $category = Category::find($id);
      return view('admin.category.edit',compact('category'));
   }

   public function update_category(Request $request)
   {
       $cat_id = $request->id;

       $request->validate([
                 'bne' =>'required',
                 'bnh' =>'required',
                 'icon' =>'required',
           ],[
            'bne' => 'Category English Name is Required',
            'bnh' => 'Category Hindi Name is Required',
            'icon' => 'Icon Name is Required',
           ]);

        Category::findOrFail($cat_id)->update([
         'cat_name_hin' => $request->bnh,
         'cat_name_en' => $request->bne,
         'cat_slug_en' => strtolower(str_replace(' ','-',$request->bne)), 
         'cat_slug_hin' => str_replace(' ','-',$request->bnh),
         'cat_icon' => $request->icon,        
        ]);

        $notification = [
         
           'message' => 'Category Updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('category.list')->with($notification);
   }

   public function delete_category($id)
   {
         Category::findOrFail($id)->delete();

         $notification = [
         
           'message' => 'Category Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('category.list')->with($notification);
   }
}
