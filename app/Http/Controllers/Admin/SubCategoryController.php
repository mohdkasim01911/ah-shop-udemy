<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcat = SubCategory::all();
        return view('admin.category.subcategory',compact('subcat'));
    }

    public function add()
    {
        $category = Category::orderBy('cat_name_en','asc')->get();
        return view('admin.category.addsubcat',compact('category'));
    }

    public function store(Request $request)
    {
         $request->validate([
                 'category_id' =>'required',
                 'bne' =>'required',
                 'bnh' =>'required',
           ],[
            'category_id.required' =>'Category is Required',
            'bne.required.required' => 'SubCategory English Name is Required',
            'bnh.required' => 'SubCategory Hindi Name is Required',
           ]);

        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcat_name_hin' => $request->bnh,
         'subcat_name_en' => $request->bne,
         'subcat_slug_hin' => strtolower(str_replace(' ','-',$request->bne)), 
         'subcat_slug_en' => str_replace(' ','-',$request->bnh),       
        ]);

        $notification = [
         
           'message' => 'SubCategory Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('subcategory.list')->with($notification);
    }

    public function edit_category($id)
    {
        $category = Category::orderBy('cat_name_en','asc')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcatedit',compact('category','subcategory'));
    }

    public function update_category(Request $request)
    {
      
       $subcat_id = $request->id;

       $request->validate([
                 'category_id' =>'required',
                 'bne' =>'required',
                 'bnh' =>'required',
           ],[
            'category_id.required' =>'Category is Required',
            'bne.required.required' => 'SubCategory English Name is Required',
            'bnh.required' => 'SubCategory Hindi Name is Required',
           ]);

        SubCategory::findOrFail($subcat_id)->update([
         'category_id' => $request->category_id,
         'subcat_name_hin' => $request->bnh,
         'subcat_name_en' => $request->bne,
         'subcat_slug_hin' => strtolower(str_replace(' ','-',$request->bne)), 
         'subcat_slug_en' => str_replace(' ','-',$request->bnh),       
        ]);

        $notification = [
         
           'message' => 'SubCategory updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('subcategory.list')->with($notification);
    }

    public function delete_category($id)
    {
         SubCategory::findOrFail($id)->delete();

         $notification = [
         
           'message' => 'SubCategory Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('subcategory.list')->with($notification);
    }
}
