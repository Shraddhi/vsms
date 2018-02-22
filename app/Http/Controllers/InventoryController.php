<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bike;
use App\Part;
use DB;
use Carbon\Carbon;

class InventoryController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('guest', ['except' => 'logout']);
    }

    
     public function index()
    {
        if(Auth::user()){
            $adt=Carbon::now();
            $b=DB::select('SELECT model,COUNT(model) as units FROM `bikes` where status="0" GROUP by model');
             $b1=DB::select('SELECT * FROM `parts` where units>0 ');
             $bikedata=DB::select('SELECT * FROM `bikes` where status=0');
        return view('inventory.index',array('user'=>Auth::user(),'data'=>$b,'tdt'=>$adt,'data1'=>$b1,'databike'=>$bikedata));
             }
        else{
            return redirect()->back();
        }
    }
    
    
    
    //for bike parts
    public function edit($id){
         if(Auth::user()){
        $editid=Part::find($id);
        return view('inventory.editbikepart',compact('editid'),array('user'=>Auth::user()));
              }
        else{
            return redirect()->back();
        }
    }
     public function update(Request $request,$id){
        
         if(Auth::user()){
            $post=$request->all();
             $today=Carbon::now();
             $data=array(
                 'parts_no'=>$post['parts_no'],
                 'parts_name'=>$post['parts_name'],
                 'units'=>$post['units'],
                 'bike_model'=>$post['bike_model'],
                 'color'=>$post['color'],
                 
                 'purchaseprice'=>$post['purchaseprice'],
                 'price'=>$post['price'],
                 'datetaken'=>$post['datetaken'],
                 'status'=>$post['status']
            
           
           
                        );
         $ct= Part::find($post['bikeparteditid']);
             $ct->update($data);
        return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
     public function destroy($id){
         if(Auth::user()){
        Part::find($id)->delete();
        return redirect()->back();
              }
        else{
            return redirect()->back();
        }
    }

   
  

}
