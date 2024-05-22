<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function index(){
        $orders = Order::all();
        // dd($orders);
        $voucherNoGroups = $orders->groupBy('voucherNo')->toArray();
        // dd($voucherNoGroups);
        $orderWithUser = [];
        foreach($voucherNoGroups as $voucher){
            $orderIDs = array_column($voucher,'id');
            // var_dump($orderIDs);
            $orderWithUser[]= Order::with('user')->whereIn('id',$orderIDs)->where('status','pending')->first();
        }
        return view('admin.orders.index',compact('orderWithUser','voucherNoGroups'));
    }

    //order Accept
    public function orderAccept(){
        $orders = Order::all();
        // dd($orders);
        $voucherNoGroups = $orders->groupBy('voucherNo')->toArray();
        // dd($voucherNoGroups);
        foreach($voucherNoGroups as $voucher){
            $orderIDs = array_column($voucher,'id');
            // var_dump($orderIDs);
            $orderWithUser[]= Order::with('user')->whereIn('id',$orderIDs)->where('status','Accept')->first();
        }
        return view('admin.orders.index',compact('orderWithUser','voucherNoGroups'));
    }

      //order Complete
      public function orderComplete(){
        $orders = Order::all();
        // dd($orders);
        $voucherNoGroups = $orders->groupBy('voucherNo')->toArray();
        // dd($voucherNoGroups);
        foreach($voucherNoGroups as $voucher){
            $orderIDs = array_column($voucher,'id');
            // var_dump($orderIDs);
            $orderWithUser[]= Order::with('user')->whereIn('id',$orderIDs)->where('status','Complete')->first();
        }
        return view('admin.orders.index',compact('orderWithUser','voucherNoGroups'));
    }

    // Detail 
    public function detail($voucherNo){
        // echo $voucherNo;
        $orderFirst = Order::where('voucherNo',$voucherNo)->first();

        $orders = Order::where('voucherNo',$voucherNo)->get();
        
        return view('admin.orders.detail',compact('orderFirst','orders'));
    }

    // Status Change
    public function status(Request $request, $voucherNo){
        
        // dd($voucherNo);
        // hidden နဲ့ input box က သယ်လာတဲ့ value="complete" ကို status chage လိုက်ပီဲ
        Order::where('voucherNo',$voucherNo)->update(['status' => $request->status]);
        return redirect()->route('backend.orders.index');
    }
}
