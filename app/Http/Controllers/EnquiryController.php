<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Enquiry;
use Auth;

class EnquiryController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $data=DB::select('select * from enquiries');
        return view('enquiry.index',array('user'=>Auth::user(),'datas'=>$data));
            
             }
        else{
            return redirect()->back();
        }
    }
    public function add()
    {
        if(Auth::user()){
        return view('enquiry.create',array('user'=>Auth::user()));
             }
        else{
            return redirect()->back();
        }
    }
    public function create(Request $request)
    {
        if(Auth::user()){
            $enq=new Enquiry();
            $enq->name=Input::get('ename');
            $enq->address=Input::get('eaddress');
            $enq->phone=Input::get('ephone');
            $enq->date=Input::get('edate');
            $enq->topic=Input::get('etopic');
            $enq->message=Input::get('edetails');
            $enq->save();
       return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
    
      public function edit($id){
         if(Auth::user()){
        $editid=Enquiry::find($id);
        return view('enquiry.edit',compact('editid'),array('user'=>Auth::user()));
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
        Enquiry::find($id)->delete();
        return redirect()->back();
              }
        else{
            return redirect()->back();
        }
    }

  

}
