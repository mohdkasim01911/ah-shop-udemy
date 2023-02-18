<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\shiping;
use App\Models\admin\Distric;
use App\Models\admin\AreaState;

class ShipingController extends Controller
{
 
    public function index(){
        $division = shiping::all();
        return view('admin.shiping.division.division',compact('division'));
    }

    public function addshow(){
        return view('admin.shiping.division.add');
    }

    public function store(Request $request){
        
          $request->validate([
                 'division' =>'required',
           ]);

        shiping::insert([
         'division_name' => $request->division,       
        ]);

        $notification = [
         
           'message' => 'Division Inserted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('shiping.view')->with($notification);


    }

    public function edit($id){
        $division = shiping::findOrFail($id);
       return view('admin.shiping.division.eddit',compact('division'));
    }

     public function update(Request $request, $id){
        $request->validate([
                 'division' =>'required',
           ]);

        shiping::findOrFail($id)->update([
         'division_name' => $request->division,       
        ]);

        $notification = [
         
           'message' => 'Division updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('shiping.view')->with($notification);
    }

    public function delete($id){
     shiping::findOrFail($id)->delete();
       
       $notification = [
         
           'message' => 'Division Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('shiping.view')->with($notification);
    }


   public function distric_view(){
        $distric = Distric::all();
        return view('admin.shiping.distric.distric',compact('distric'));
    }

    public function distric_addshow(){
         $division = shiping::all();
        return view('admin.shiping.distric.distric_add',compact('division'));
    }

    public function distric_store(Request $request){


         $request->validate([
                 'devision_id' =>'required',
                 'distric_name' =>'required',
           ]);

        

        Distric::insert([
         'division_id' => $request->devision_id, 
         'distric_name' => $request->distric_name,       
        ]);

        $notification = [
         
           'message' => 'Distric Add SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('distric.view')->with($notification);
    }

    public function distric_edit($id){
        $distric = Distric::findOrFail($id);
        $division = shiping::all();
        return view('admin.shiping.distric.edit',compact('distric','division'));
    }

     public function distric_update(Request $request,$id){


         $request->validate([
                 'devision_id' =>'required',
                 'distric_name' =>'required',
           ]);

        

        Distric::findOrFail($id)->update([
         'division_id' => $request->devision_id, 
         'distric_name' => $request->distric_name,       
        ]);

        $notification = [
         
           'message' => 'Distric updated SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('distric.view')->with($notification);
    }

    public function distric_delete($id){
     Distric::findOrFail($id)->delete();
       
       $notification = [
         
           'message' => 'Distric Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('distric.view')->with($notification);
    }

    public function state_view(){

        $state = AreaState::all();
        return view('admin.shiping.state.state_view',compact('state'));

    }

    public function state_add(){
        $division = shiping::all();
        $distric = Distric::all();
        return view('admin.shiping.state.add_state',compact('distric','division'));

    }

    public function state_store(Request $request){


        $request->validate([
                 'devision_id' =>'required',
                 'distric_id' =>'required',
                 'state_name' =>'required',
           ]);

        

        AreaState::insert([
         'division_id' => $request->devision_id, 
         'distric_id' => $request->distric_id, 
         'state_name' => $request->state_name,       
        ]);

        $notification = [
         
           'message' => 'State Add SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('state.view')->with($notification);

    }

    public function state_edit($id){
     
        $division = shiping::all();
        $distric = Distric::all();
        $AreaState = AreaState::findOrFail($id);
        return view('admin.shiping.state.edit_view',compact('distric','division','AreaState'));

    }

      public function state_update(Request $request, $id){


        $request->validate([
                 'devision_id' =>'required',
                 'distric_id' =>'required',
                 'state_name' =>'required',
           ]);

        

        AreaState::findOrFail($id)->update([
         'division_id' => $request->devision_id, 
         'distric_id' => $request->distric_id, 
         'state_name' => $request->state_name,       
        ]);

        $notification = [
         
           'message' => 'update Add SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('state.view')->with($notification);

    }

    public function state_delete($id){
     AreaState::findOrFail($id)->delete();
       
       $notification = [
         
           'message' => 'State Deleted SuccessFully',
           'alert-type' => 'success'
        ];

        return redirect()->route('state.view')->with($notification);
    }


}
