<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Bike;
use App\Customer;
use App\Service;
use Carbon\Carbon;
use Excel;



class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('guest', ['except' => 'logout']);
    }


    public function index()
    {
        if(Auth::user()){
            $b=DB::select('select * from bikes');
            $s=DB::select('select * from services order by bike_model');
        return view('service.index',array('user'=>Auth::user(),'b'=>$b,'s'=>$s));
             }
        else{
            return redirect()->back();
        }
    }
    public function serv()
    {
        if(Auth::user()){
        $b=DB::select('select * from bikes');
            $s=DB::select('select * from services order by bike_model');
        return view('service.create',array('user'=>Auth::user(),'b'=>$b,'s'=>$s));
             }
        else{
            return redirect()->back();
        }
    }
     public function addbikeservice(Request $request){
        if(Auth::user()){
            $br=new Service();
            $br->name=Input::get('servicename');
            $br->type=Input::get('servicetype');
            $br->message=Input::get('servicemessage');
            $br->bike_model=Input::get('bikemodel');

            $br->timeinterval=Input::get('servicetime');


            $br->save();
        return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
    public function saveservice(Request $request){
        if(Auth::user()){
         $data=$request->all();
            for($i=0;$i<count($data['service_id']);$i++){
                $servdetail=array(
                'name'=>$data['service_id'][$i],
                'type'=>$data['servicetype'][$i],
                'cost'=>$data['cost'][$i],
                'timeinterval'=>$data['timedays'][$i],
                'message'=>$data['message'][$i],
                'bike_model'=>$data['bikemodel']
                );
                DB::table('services')->insert($servdetail);
            }
        return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
     public function saveservices(Request $request){
          if(Auth::user()){
         if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();
             $cdate=Carbon::now();


			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
                                                
						foreach ($value as $v) {	
							$insert[] = ['name' => $v['servicename'],'type' => $v['type'],'cost' => $v['cost'],'message' => $v['message'],'bike_model' => $v['bike_model'],'timeinterval' => $v['timeinterval']];
						}
					}
				}

				
				if(!empty($insert)){
					DB::table('services')->insert($insert);
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
             }
        else{
            return redirect()->back();
        } 
    }
     public function edit($id){
        if(Auth::user()){
        $editid=Service::find($id);
        return view('service.edit',compact('editid'),array('user'=>Auth::user()));
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
                 'name'=>$post['name'],
                 'type'=>$post['type'],
                 'cost'=>$post['cost'],
                 'message'=>$post['message'],
                 'timeinterval'=>$post['timeinterval'],
                 'bike_model'=>$post['model']
                  );
         $ct= Service::find($id);
             $ct->update($data);
        return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
     public function destroy($id){
         if(Auth::user()){
        Service::find($id)->delete();
        return redirect()->back();
              }
        else{
            return redirect()->back();
        }
    }


}
