<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Staff;
use App\Customer;
use App\Attendence;
use DateTime;
use Carbon\Carbon;

class LedgerviewController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('guest', ['except' => 'logout']);
    }

   
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

   
  //ledger history
    public function edit($id){
        $cs=Customer::find($id);
        $da=DB::select('select * from ledgers where cid="'.$id.'"');
        return view('ledger.seedetail',array('user'=>Auth::user(),'d'=>$cs,'da'=>$da));
    }
 
    

}
