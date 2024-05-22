<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
   public function index()
   {
    $items = Item::all();
    $categories = Category::all();
   //  dd($items);
    return view('frontend.index', compact('items','categories')); // resource>view>fronted>index.blade.php ကို ရည်ညွန်းပါတယ်
   }

   //Show items by user selected category
   public function itemCategory($categoryID){
      // echo $categoryID;
      $items = Item::where('category_id',$categoryID)->get();
      $categories = Category::all();
      return view('frontend.index',compact('items','categories'));
   }

   public function show($id)
   {
      // echo $id;
      $item=Item::find($id);
      // dd($item);
      // $items = Item::where('category_id',$item->category_id)->where('id','!=',$id)->limit(4)->get();
      $items = Item::where('category_id',$item->category_id)->where('id','!=',$id)->get();
      
      return view('frontend.shop_item',compact('item','items'));
   }

   public function checkout()
   {
      $payments = Payment::all();
      return view('frontend.checkout',compact('payments'));
   }

   public function orderNow(Request $request)
   {
      // echo $request;
      // dd($request);
      $dataArray =json_decode($request->input('orderItems'));
      // var_dump($dataArray);

      $voucherNo = strtotime(date('h:i:s'));
      // echo $voucherNo;

      $fileName = time().'.'.$request->file('paymentSlip')->extension();

      $upload = $request->file('paymentSlip')->move(public_path('paymentsSlip/'),$fileName);

      foreach($dataArray as $data){
         $order = new Order(); //model ကို လှမ်းခေါ် ဒါမှ column name တွေကို လှမ်းခေါ် လိုံ ရမယ်
         $order->voucherNo = $voucherNo;
         $order->user_id = Auth::id();
         $order->item_id = $data->id;
         $order->qty = $data->qty;
         $order->payment_id = $request->input('paymentMethod');
         $order->paymentSlip = "/paymentsSlip/".$fileName;
         $order->status = "Pending";
         $order->save();
      }
      return "Your Order Successful";
   }
}
