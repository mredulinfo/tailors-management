<?php

namespace App\Http\Controllers;

use App\catagory;
use Illuminate\Http\Request;

class catagoryController extends Controller
{
    public function create(Request $request)
    {

        $catagory = new catagory();
        $catagory->name = $request->cat_name;
        $catagory->description = $request->cat_description;
        $catagory->save();
        return response()->json(['success' => 'Data is successfully added']);

    }


    public function destroy($id)
    {
//        $del_cat= catagory::where(
//            $request['id']='id'
//        );
//        $del_cat::Destryoy;
//        catagory::destroy(\request('id'));
//        return response()->json(['success'=>'succefully deleted']);
        catagory::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
