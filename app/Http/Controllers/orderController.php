<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function create(Request $request)
    {
//        dd($request->all());
        DB::beginTransaction();

        try {
            $order = new order();
            $order->fill($request->only([
                'date', 'cloth_code', 'customer_name', 'customer_address',
                'customer_mobile', 'order_total', 'order_advance',
                'order_due', 'order_processed_by', 'remark'
            ]));

            // Associate order with a customer (assuming customer_id is passed in the request)
            $customer = null;
            if ($request->has('customer_id')) {
                $customer = Customer::findOrFail($request->customer_id);
                $customer->orders()->save($order);
            } else {
                $order->save();
            }

            // Handling items
            if ($request->has('items')) {
                foreach ($request->items as $itemId => $details) {
                    $order->items()->attach($itemId, [
                        'quantity' => $details['quantity'],
                        'price' => $details['price']
                    ]);
                }
            }

            // Handling measurements for the customer
            if ($customer && $request->has('measurements')) {
                foreach ($request->measurements as $measurementId => $value) {
                    $customer->measurements()->attach($measurementId, ['value' => $value]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error creating order: ' . $e->getMessage());
        }
    }




}
