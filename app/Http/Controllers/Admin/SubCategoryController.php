<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;
use App\Models\admin\SubsubCategory;

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


    // sub sub category function start

    public function subsubcategory()
    {
        $subsubcat = SubsubCategory::all();

        return view('admin.category.subsubcategory',compact('subsubcat'));
    }

    public function subsubcategorystore()
    {    
        $category = Category::orderBy('cat_name_en','ASC')->get();
        return view('admin.category.addsubsubcategory',compact('category'));
    }

    public function ajaxsubcategory($category_id){
       $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcat_name_en','ASC')->get();
       return json_encode($subcat);
    }

    public function sub_subcat_store(Request $request)
    {
         $request->validate([
                 'category_id' =>'required',
                 'subcategory_id' =>'required',
                 'subcaten' =>'required',
                 'subcateh' =>'required',
           ]);

        SubsubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_hin' => $request->subcateh,
         'subsubcategory_name_en' => $request->subcaten,
         'subsubcategory_slug_hin' => strtolower(str_replace(' ','-',$request->subcaten)), 
         'subsubcategory_slug_en' => str_replace(' ','-',$request->subcateh),       
        ]);

        $notification = [
         
           'message' => 'Sub->SubCategory Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('subsubcategory.list')->with($notification);
    }
}
