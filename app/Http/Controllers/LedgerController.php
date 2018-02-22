<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Staff;
use App\Customer;
use App\Ledger;
use App\Attendence;
use DateTime;
use Carbon\Carbon;

class LedgerController extends Controller
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
             $ledger=DB::select('select * from ledgers');
             $customere=DB::select('select * from customers ');
            
                 $customer=DB::select('select * from customers ');  
                 
             
         
        return view('ledger.index',array('user'=>Auth::user(),'cus'=>$customer,'ledger'=>$ledger,'cuse'=>$customere));
             }
        else{
            return redirect()->back();
        }
    }
//    Add new Ledgers
    public function addledger(Request $request)
    {
        if(Auth::user()){
          
           $ledger=DB::select('select * from ledgers');
             
            
             $customer=DB::select('select * from customers ');
            
            $post=$request->all();
            $today=Carbon::now();
            $data=array(
                'cid'=>$post['customer'],
                'credit'=>$post['credit'],
                'debit'=>$post['debit'],
                'purpose'=>$post['purpose'],
                'created_at'=>$today
            );
            DB::table('ledgers')->insert($data);
       return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }

    
   
  //ledger history
   
   public function edit($id){
        if(Auth::user()){
        $editid=Ledger::find($id);
        $cusid=Customer::find($id);
        return view('ledger.edit',compact('editid'),array('user'=>Auth::user(),'cusid'=>$cusid));
              }
        else{
            return redirect()->back();
        }
    }

     public function update(Request $request,$id){
        
         if(Auth::user()){
            $post=$request->all();
             
             $data=array(
                 'credit'=>$post['credit'],
                 'purpose'=>$post['purpose'],
                 'debit'=>$post['debit']
                  );
         $ct= Ledger::find($id);
             $ct->update($data);
        return redirect()->back();
             }
        else{
            return redirect()->back();
        }
    }
     public function destroy($id){
         if(Auth::user()){
        Ledger::find($id)->delete();
        return redirect()->back();
              }
        else{
            return redirect()->back();
        }
    }

}
