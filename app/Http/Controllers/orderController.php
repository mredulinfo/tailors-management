<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;

class orderController extends Controller
{
    public function create(Request $request)
    {
        $order = new order();
        $order->date = $request->order_date;
        $order->cloth_code = $request->cloth_code;
        $order->customer_id = $request->cus_id;
        $order->customer_name = $request->cus_name;
        $order->mobile = $request->cus_mobile;
        $order->product_name = $request->cus_product;
        $order->cus_h = $request->cus_h;
        $order->cus_n = $request->cus_n;
        $order->cus_b = $request->cus_b;
        $order->cus_w = $request->cus_w;
        $order->process_by = $request->order_pro;
        $order->remark = $request->order_remark;
        $order->order_total = $request->order_total;
        $order->order_advance = $request->order_advance;
        $order->order_due = $request->order_due;
        $order->save();
        return response()->json(['success'=>'Data is successfully added']);
    }

//    public function read(){
//        $orders=order::get();
//        return view('add_order', compact('orders'));
//    }

}
