<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use DB;

class SaleController extends Controller
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

            $cs=DB::select('select * from customers order by id desc');
            $ps=DB::table('partssell')
                ->join('ordersparts','partssell.order_id','=','ordersparts.id')
                ->select('partssell.*','ordersparts.ordername','ordersparts.street_name')
                ->get();
             $bs=DB::table('bikesales')
                ->join('orders','bikesales.order_id','=','orders.id')
                ->select('bikesales.*','orders.ordername','orders.street_name')
                ->get();
        return view('sale.index',array('user'=>Auth::user(),'cs'=>$cs));
             }
        else{
            return redirect()->back();
        }
    }
     public function parts()
    {
        if(Auth::user()){
            $cs=DB::select('select * from partssell order by id desc');
        return view('sale.parts',array('user'=>Auth::user(),'cs'=>$cs));
             }
        else{
            return redirect()->back();
        }
    }
   
  public function bill_view()
  {
    if(Auth::user()){
          $ps=DB::table('partssell')
                ->join('ordersparts','partssell.order_id','=','ordersparts.id')
                ->select('partssell.*','ordersparts.ordername','ordersparts.street_name')
                ->get();
             $bs=DB::table('bikesales')
                ->join('orders','bikesales.order_id','=','orders.id')
                ->select('bikesales.*','orders.ordername','orders.street_name')
                ->get();
           // $cs=DB::select('select * from partssell order by id desc');
       print_r($bs);
        return view('sale.billsView',array('user'=>Auth::user(),'bs'=>$bs,'ps'=>$ps));
             }
        else{
            return redirect()->back();
        } 
  }
 public function printBikeBill($id){
    if(Auth::user()){
             $bs=DB::table('bikesales')
                ->join('orders','bikesales.order_id','=','orders.id')
                ->select('bikesales.*','orders.ordername','orders.street_name')
                ->where('orders.ordername','=',$id)
                ->get();
         // print_r($bs);

           // $cs=DB::select('select * from partssell order by id desc');
        return view('sale.printBikeBill',array('user'=>Auth::user(),'bs'=>$bs));
             }
        else{
            return redirect()->back();
        } 
 }

}
