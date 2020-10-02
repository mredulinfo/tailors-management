<?php

namespace App\Http\Controllers;
use App\income;
use Illuminate\Http\Request;

class incomeController extends Controller
{
   public function  index(Request $request){
//       $order_total = order::find(\request('id'));
//       $orders = $order_total->order_total;
//        return view('try', compact('orders'));
       $orders=order::find(\request('id'));
       $order_org= $orders;
       dd($order_org);
   }
}
