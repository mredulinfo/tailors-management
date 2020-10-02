<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;

class orderview extends Controller
{
    public function index(){
        $orders= order::all();
        return view('try');
    }

    public function try(){
        $orders= order::all();
        return view('try',compact('orders'));
    }
}
