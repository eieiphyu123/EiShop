<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
    return view('frontend.index'); // resource>view>fronted>index.blade.php ကို ရည်ညွန်းပါတယ်
   }
   public function show($id)
   {
      echo $id;
      return view('frontend.shop_item');
   }
}
