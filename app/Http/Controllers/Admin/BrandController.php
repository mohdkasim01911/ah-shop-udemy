<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\BrandModel;
use Image;

class BrandController extends Controller
{
    public function index(){
        $brand = BrandModel::all();
        return view('admin.brand',compact('brand'));
    }

    public function store(Request $request)
    {
           $request->validate([
                 'bne' =>'required',
                 'bnh' =>'required',
                 'image' =>'required',
           ],[
            'bne' => 'Brand English Name is Required',
            'bnh' => 'Brand Hindi Name is Required',
           ]);

        $image = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$filename);
        $save_url = 'upload/brand/'.$filename;

        BrandModel::insert([
         'brand_name_hin' => $request->bnh,
         'brand_name_en' => $request->bne,
         'brand_slug_en' => strtolower(str_replace(' ','-',$request->bne)), 
         'brand_slug_hin' => str_replace(' ','-',$request->bnh),
         'brand_image' => $save_url,        
        ]);

        $notification = [
         
           'message' => 'Brand Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    public function edit_brand($id)
    {
        $brand = BrandModel::find($id);
        return view('admin.edit_brand',compact('brand'));
    }
    
    public function update_brand(Request $request, $id)
    {
         $brand_id = $request->id;
         $brand_image = $request->images;

          $request->validate([
                 'bne' =>'required',
                 'bnh' =>'required',
                 'image' =>'required',
           ],[
            'bne' => 'Brand English Name is Required',
            'bnh' => 'Brand Hindi Name is Required',
           ]);

         if($request->file('image'))
         {

            unlink($brand_image);
            $image = $request->file('image');
            $filename = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(150,150)->save('upload/brand/'.$filename);
            $save_url = 'upload/brand/'.$filename;

            BrandModel::findOrFail($brand_id)->update([
             'brand_name_hin' => $request->bnh,
             'brand_name_en' => $request->bne,
             'brand_slug_en' => strtolower(str_replace(' ','-',$request->bne)), 
             'brand_slug_hin' => str_replace(' ','-',$request->bnh),
             'brand_image' => $save_url,        
            ]);

         }else{

            BrandModel::findOrFail($brand_id)->update([
             'brand_name_hin' => $request->bnh,
             'brand_name_en' => $request->bne,
             'brand_slug_en' => strtolower(str_replace(' ','-',$request->bne)), 
             'brand_slug_hin' => str_replace(' ','-',$request->bnh),        
            ]);

         }

           $notification = [
         
           'message' => 'Brand Updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('admin.brand')->with($notification);
    }

    public function delete_brand($id)
    {
          $image = BrandModel::find($id)->brand_image;

          unlink($image);

          BrandModel::findOrFail($id)->delete();

          $notification = [
         
           'message' => 'Brand Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
         
    }

}
