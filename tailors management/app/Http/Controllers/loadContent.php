<?php

namespace App\Http\Controllers;

use App\catagory;
use App\customer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\order;

class loadContent extends Controller
{
    public function index(){

        return view('index');
    }
    public function dash_view()
    {
// today order count
        $date= new Carbon();
        $today = $date->timezone('Asia/Dhaka');
        $order_count= order::whereDate('created_at', today())->get();
        $order_count_today= $order_count->count();
//        Add today order amount

        $order_org= $order_count->pluck('order_total');
        $order_org_advance=$order_count->pluck('order_advance')->sum();
        $order_amount= $order_org->sum();
        $userdb=User::all();
        return view('dashboard', compact('order_org_advance','userdb', 'order_count_today', 'order_amount', 'today'));
    }


    public function add_order(){
        $orders=order::all();
        $customers=customer::all();
        return view('add_order',compact('orders', 'customers'));
    }
//    Finishing of Order


    public function add_product(){

        $catagories= catagory::all();

        return view('add_product', compact('catagories'));
    }




//
    public function add_purchase(){
        return view('add_purchase');
    }
    public function add_sell(){
        return view('add_sell');
    }
    public function expense(){
        return view('expense');
    }
    public function footer(){
        return view('footer');
    }
    public function order_list(){
        return view('order_list');
    }
    public function receivable(){
        return view('receivable');
    }




}
