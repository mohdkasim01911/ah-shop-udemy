<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('admin.slider.slider',compact('slider'));
    }

    public function addshow()
    {
        return view('admin.slider.add_slider');
    }

    public function store(Request $request)
    {
        $request->validate([
                 'slider_title' =>'required',
                 'slider_desc' =>'required',
                 'image' =>'required',
           ]);

        $image = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$filename);
        $save_url = 'upload/slider/'.$filename;

        Slider::insert([
         'title' => $request->slider_title,
         'description' => $request->slider_desc,
         'status' => 1,
         'slider_image' => $save_url,        
        ]);

        $notification = [
         
           'message' => 'Slider Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('slider.view')->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id)->first();
        return view('admin.slider.edit',compact('slider'));
    }

     public function update(Request $request, $id)
    {
        $request->validate([
                 'slider_title' =>'required',
                 'slider_desc' =>'required',
           ]);

        if($request->file('image'))
        {     
            $images = Slider::findOrFail($id)->slider_image;
            unlink($images);
            $image = $request->file('image');
            $filename = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$filename);
            $save_url = 'upload/slider/'.$filename;

            Slider::findOrFail($id)->update([
             'title' => $request->slider_title,
             'description' => $request->slider_desc,
             'status' => 1,
             'slider_image' => $save_url,        
            ]);
        }else{

             Slider::findOrFail($id)->update([
             'title' => $request->slider_title,
             'description' => $request->slider_desc,
             'status' => 1,      
            ]);

        }

        $notification = [
         
           'message' => 'Slider Updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('slider.view')->with($notification);
    }

    public function delete($id){

        $images = Slider::findOrFail($id)->slider_image;
        unlink($images);
        Slider::findOrFail($id)->delete();

        $notification = [
         
           'message' => 'Slider Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('slider.view')->with($notification);

     
    }




}
