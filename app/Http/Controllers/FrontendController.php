<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class FrontendController extends Controller
{
   public function index()
   {
    $items = Item::all();
   //  dd($items);
    return view('frontend.index', compact('items')); // resource>view>fronted>index.blade.php ကို ရည်ညွန်းပါတယ်
   }
   public function show($id)
   {
      // echo $id;
      $item=Item::find($id);
      // dd($item);
      return view('frontend.shop_item',compact('item'));
   }
}
