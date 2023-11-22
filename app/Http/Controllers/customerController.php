<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255'
        ]);

        $customer = Customer::create($validatedData);

        return response()->json(['message' => 'Customer added successfully', 'customer' => $customer]);
    }


}
