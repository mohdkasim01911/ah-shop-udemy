<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\BrandModel;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;
use App\Models\admin\SubsubCategory;
use App\Models\admin\Product;
use App\Models\admin\multiimage;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function addProduct()
    {    
        $categorys = Category::latest()->get();
        $brands = BrandModel::latest()->get();
        return view('admin.product.addProduct',compact('categorys','brands'));
    }

    public function store(Request $request)
    {    
            $image = $request->file('product_thambnail');
            $filename = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(917,1000)->save('upload/products/thumbnails/'.$filename);
            $save_url = 'upload/products/thumbnails/'.$filename;

       $product_id = product::insertGetId([

              'brand_id' => $request->brand_id,
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'subsubcategory_id' => $request->subsubcategory_id,
              'product_name_en' => $request->product_name_en,
              'product_name_hin' => $request->product_name_hin,
              'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
              'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
              'product_code' => $request->product_code,
              'product_qty' => $request->product_qty,
              'product_tags_en' => $request->product_tags_en,
              'product_tags_hin' => $request->product_tags_hin,
              'product_size_en' => $request->product_size_en,
              'product_size_hin' => $request->product_size_hin,
              'product_color_en' => $request->product_color_en,
              'product_color_hin' => $request->product_color_hin,
              'product_selling_price' => $request->product_selling_price,
              'product_discont_price' => $request->product_discont_price,
              'short_desc_en' => $request->short_desc_en,
              'short_desc_hin' => $request->short_desc_hin,
              'long_desc_en' => $request->long_desc_en,
              'long_desc_hin' => $request->long_desc_hin,
              'hot_deals' => $request->hot_deals,
              'featured' => $request->featured,
              'special_offer' => $request->special_offer,
              'special_deals' => $request->special_deals,
              'created_at' => Carbon::now(),
              'status' => 1,
              'product_thambnail' => $save_url,
         ]);

         $images = $request->file('photo_name');

         foreach($images as $img)
         {
    

            $filename = hexdec(uniqid()).'.'.$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('upload/products/multimage/'.$filename);
            $photopath = 'upload/products/multimage/'.$filename;
           
            multiimage::insert([
                'product_id' => $product_id,
                'photo_name' => $photopath,
                'created_at' => Carbon::now(),
            ]);

         }

         $notification = [
         
           'message' => 'Product Add SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);


    }

    public function view_product()
    {
        $products = Product::latest()->get();
        return view('admin.product..show_product',compact('products'));
    }

    public function edit_product($id)
    {
       $brands = BrandModel::latest()->get();
       $categorys = Category::latest()->get();
       $subcategorys = SubCategory::latest()->get();
       $subsubcategory = SubsubCategory::latest()->get(); 
       $product = Product::findOrFail($id);

       return view('admin.product.edit_product',compact('brands','categorys','subcategorys','subsubcategory','product'));
    }

    public function update_product(Request $request, $id)
    {
           product::findOrFail($id)->update([

              'brand_id' => $request->brand_id,
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'subsubcategory_id' => $request->subsubcategory_id,
              'product_name_en' => $request->product_name_en,
              'product_name_hin' => $request->product_name_hin,
              'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
              'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
              'product_code' => $request->product_code,
              'product_qty' => $request->product_qty,
              'product_tags_en' => $request->product_tags_en,
              'product_tags_hin' => $request->product_tags_hin,
              'product_size_en' => $request->product_size_en,
              'product_size_hin' => $request->product_size_hin,
              'product_color_en' => $request->product_color_en,
              'product_color_hin' => $request->product_color_hin,
              'product_selling_price' => $request->product_selling_price,
              'product_discont_price' => $request->product_discont_price,
              'short_desc_en' => $request->short_desc_en,
              'short_desc_hin' => $request->short_desc_hin,
              'long_desc_en' => $request->long_desc_en,
              'long_desc_hin' => $request->long_desc_hin,
              'hot_deals' => $request->hot_deals,
              'featured' => $request->featured,
              'special_offer' => $request->special_offer,
              'special_deals' => $request->special_deals,
              'created_at' => Carbon::now(),
              'status' => 1,
         ]);

           $notification = [
         
           'message' => 'Product update SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('manage.product')->with($notification);

    }
}
