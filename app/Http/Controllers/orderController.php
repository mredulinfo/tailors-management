<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerMeasurement;
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
            return response()->json(['success' => 'Order created successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error creating order: ' . $e->getMessage()], 500);
        }
    }


    public function getOrdersData()
    {
        $orders = Order::with('items')->get(); // Fetch all orders with their related items

        // Map the orders to the format expected by DataTables
        $data = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'delivery' => $order->date,
                'name' => $order->customer_name,
                'mobile' => $order->customer_mobile,
                'total' => $order->order_total,

            ];
        });

        // Prepare the response for DataTables
        $response = [
            "draw" => intval(request()->draw), // DataTables draw counter
            "recordsTotal" => Order::count(), // Total records before filtering
            "recordsFiltered" => Order::count(), // Total records after filtering (if no filtering is applied, it's the same as recordsTotal)
            "data" => $data // The array of order data
        ];

        return response()->json($response);
    }


//individual order details from view modal in list orders
    public function getOrderDetails($orderId)
    {
        $order = Order::with(['items', 'customer' => function ($query) {
            // Subquery to get the latest measurement_id for each customer
            $latestMeasurements = CustomerMeasurement::selectRaw('MAX(id) as id, measurement_id')
                ->whereNotNull('value')
                ->groupBy('measurement_id');

            $query->with(['measurements' => function ($query) use ($latestMeasurements) {
                $query->joinSub($latestMeasurements, 'latest_measurements', function ($join) {
                    $join->on('customer_measurements.id', '=', 'latest_measurements.id');
                });
            }]);
        }])->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        return response()->json($order);
    }










}
