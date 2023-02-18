<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Coupan;

class CoupanController extends Controller
{
    public function index(){
       
       $coupan = Coupan::all();
        return view('admin.coupan.coupan_show',compact('coupan'));

    }

    public function addshow()
    {
        return view('admin.coupan.coupan_add');
    }

     public function store(Request $request)
    {
         $request->validate([
                 'copan_name' =>'required',
                 'coupan_discount' =>'required',
                 'copan_date' =>'required',
           ]);

        Coupan::insert([
         'coupan_name' => strtoupper($request->copan_name),
         'coupan_discount' => $request->coupan_discount,
         'coupan_validety' => $request->copan_date,        
        ]);

        $notification = [
         
           'message' => 'Coupan Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('coupan.view')->with($notification);
    }


    public function edit($id)
    {
        $coupan = Coupan::findOrFail($id);
        return view('admin.coupan.coupan_edit',compact('coupan'));
    }

    public function update(Request $request, $id){

          $request->validate([
                 'copan_name' =>'required',
                 'coupan_discount' =>'required',
                 'copan_date' =>'required',
           ]);

        Coupan::findOrFail($id)->update([
         'coupan_name' => strtoupper($request->copan_name),
         'coupan_discount' => $request->coupan_discount,
         'coupan_validety' => $request->copan_date,        
        ]);

        $notification = [
         
           'message' => 'Coupan Update SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('coupan.view')->with($notification);
     
    }

    public function delete($id)
    {
        $coupan = Coupan::findOrFail($id)->delete();
        
        $notification = [
         
           'message' => 'Coupan Delete SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

}
