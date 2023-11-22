<?php

namespace App\Http\Controllers;

use App\catagory;
use App\customer;
use App\Format;
use App\Item;
use App\Measurement;
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
        $formats = Format::all();
        return view('add_order',compact('orders', 'customers', 'formats'));
    }

//    Finishing of Order

    public function add_product(){

        $catagories= catagory::all();

        return view('add_product', compact('catagories'));
    }


//    Get measurement data-
    protected function getMeasurementsData()
    {
        return Measurement::all();
    }


//    Measurement Details

    public function add_measurements(Request $request){

        $measurements = new Measurement();
        $measurements->name = $request->name;
        $measurements->save();
        return response()->json(['success' => 'Data is successfully added']);

    }

    public function measurements_destroy($id) {
        $measurement = Measurement::find($id);

        if ($measurement) {
            $measurement->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        } else {
            return response()->json([
                'error' => 'Record not found.'
            ], 404);
        }
    }

    public function measurements(){
        $measurements =  $this->getMeasurementsData();
        return view('measurements', compact('measurements'));
    }



    //    Measurement Details

    public function add_format(Request $request){

        $formats = new Format();
        $formats->name = $request->name;
        $formats->save();
        return response()->json(['success' => 'Data is successfully added']);

    }


    public function format_destroy($id) {
        $format = Format::find($id);

        if ($format) {
            $format->delete();
            return response()->json([
                'success' => 'Format deleted successfully!'
            ]);
        } else {
            return response()->json([
                'error' => 'Record not found.'
            ], 404);
        }
    }



    public function formatsview(){
        $formats = Format::all();
        $measurements = $this->getMeasurementsData();
        return view('formats', compact('formats', 'measurements'));
    }

    public function getMeasurementsByFormat($formatId)
    {
        $format = Format::with('measurements')->find($formatId);
        $allMeasurements = Measurement::all();

        if ($format) {
            // Mark which measurements are associated with this format
            $associatedIds = $format->measurements->pluck('id')->toArray();
            $allMeasurements->transform(function ($measurement) use ($associatedIds) {
                $measurement->is_associated = in_array($measurement->id, $associatedIds);
                return $measurement;
            });

            return response()->json($allMeasurements);
        } else {
            // If format does not exist or has no associated measurements
            return response()->json(Measurement::all()->transform(function ($measurement) {
                $measurement->is_associated = false;
                return $measurement;
            }));
        }
    }






    public function saveAssociations(Request $request)
    {
        $formatId = $request->input('formatId');
        $measurementIds = $request->input('measurementIds');

        $format = Format::find($formatId);
        if ($format) {
            $format->measurements()->sync($measurementIds);
            return response()->json(['message' => 'Associations saved successfully']);
        }

        return response()->json(['message' => 'Format not found'], 404);
    }

//    Format fetch for order form dropdown

    public function getFormatsForOrder() {
        $formats = Format::all();
        return response()->json($formats);
    }

//Item Related code

    protected function getItemsData()
    {
        return Item::all();
    }


//    Measurement Details

    public function add_items(Request $request){
        $items = new Item();
        $items->name = $request->name;
        $items->save();
        return response()->json(['success' => 'Data is successfully added']);

    }

    public function item_all_show() {
        return Item::all(); // This will return a JSON response
    }


    public function item_destroy($id) {
        $items = Item::find($id);
        if ($items) {
            $items->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        } else {
            return response()->json([
                'error' => 'Record not found.'
            ], 404);
        }
    }

    public function items(){
        $items =  $this->getItemsData();
        return view('items', compact('items'));
    }










//Customer Data load
    public function fetchCustomers(Request $request)
    {
        $search = $request->get('q');

        // Query your customer model. Adjust the query as needed.
        $customers = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('mobile', 'like', '%' . $search . '%')
            ->get(['id', 'name', 'mobile']);

        return response()->json($customers);
    }

    public function getCustomerDetails($customerId)
    {
        $customer = Customer::find($customerId);

        if ($customer) {
            return response()->json($customer);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }

//order form format dropdown measurement input field
    public function getMeasurementsByFormatForOrder($formatId)
    {
        $format = Format::with('measurements')->find($formatId);

        if ($format) {
            // Return only the measurements associated with this format
            return response()->json($format->measurements);
        } else {
            // If the format does not exist or has no associated measurements
            return response()->json([]);
        }
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
